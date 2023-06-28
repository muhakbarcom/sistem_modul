SELECT
    p.client_name,
    p.project_code,
    p.name,
    p.project_value as contract_amount,
    inv.invoice_amount, (
        SELECT
            IF (
                inv.invoice_date,
                DATE_FORMAT(inv.invoice_date, '%Y-%m'),
                vdc.date
            )
        from dual
    ) as date, (
        SELECT
            SUM(invx.invoice_amount)
        from invoice invx
        WHERE
            invx.project_code = inv.project_code
            AND DATE_FORMAT(invx.invoice_date, '%Y-%m') <= DATE_FORMAT(inv.invoice_date, '%Y-%m')
    ) as running_invoice_amount, (
        SELECT
            IF(
                vdca.amount IS NULL,
                0,
                SUM(vdca.amount)
            )
        from
            v_direct_cost vdca
        where
            vdca.date <= vdc.date
            and vdca.project_code = p.project_code
    ) as direct_cost, (
        SELECT
            ROUND(
                invoice_amount / (
                    SELECT
                        SUM(invoice_amount)
                    FROM
                        invoice
                    WHERE
                        invoice.invoice_date = inv.invoice_date
                ) * (
                    SELECT
                        IF(amount IS NULL, 0, SUM(amount))
                    from
                        v_general_cost
                    where
                        date = DATE_FORMAT(inv.invoice_date, '%Y-%m')
                )
            )
        FROM
            dual
    ) as general_cost, (
        SELECT
            ROUND(
                invoice_amount / (
                    SELECT
                        SUM(invoice_amount)
                    FROM
                        invoice
                    WHERE
                        invoice.invoice_date = inv.invoice_date
                ) * (
                    SELECT
                        IF(amount IS NULL, 0, SUM(amount))
                    from
                        v_overhead_cost
                    where
                        date = DATE_FORMAT(inv.invoice_date, '%Y-%m')
                )
            )
        FROM
            dual
    ) as overhead_cost, (
        SELECT (
                direct_cost + general_cost + overhead_cost
            )
        from
            dual
    ) as total_cost, (
        SELECT (
                running_invoice_amount - total_cost
            )
    ) as EBIT
from invoice inv
    JOIN v_direct_cost vdc ON (
        DATE_FORMAT(inv.invoice_date, '%Y-%m') = vdc.date AND inv.project_code = vdc.project_code
    )
    JOIN project p ON (
        inv.project_code = p.project_code
    )
UNION
SELECT
    p.client_name,
    p.project_code,
    p.name,
    p.project_value as contract_amount,
    inv.invoice_amount, (
        SELECT
            IF (
                inv.invoice_date,
                DATE_FORMAT(inv.invoice_date, '%Y-%m'),
                vdc.date
            )
        from
            dual
    ) as date,
    0 as running_invoice_amount, (
        SELECT
            SUM(vdca.amount)
        from
            v_direct_cost vdca
        where
            vdca.date <= vdc.date
            and vdca.project_code = p.project_code
    ) as direct_cost,
    0 as general_cost,
    0 as overhead_cost, (
        SELECT (
                direct_cost + general_cost + overhead_cost
            )
        from
            dual
    ) as total_cost, (
        SELECT (
                running_invoice_amount - total_cost
            )
    ) as EBIT
from invoice inv
    RIGHT JOIN v_direct_cost vdc ON (
        DATE_FORMAT(inv.invoice_date, '%Y-%m') = vdc.date AND inv.project_code = vdc.project_code
    )
    JOIN project p ON (
        vdc.project_code = p.project_code
    )
WHERE inv.invoice_date IS NULL
UNION
SELECT
    p.client_name,
    p.project_code,
    p.name,
    p.project_value as contract_amount,
    inv.invoice_amount, (
        SELECT
            IF (
                inv.invoice_date,
                DATE_FORMAT(inv.invoice_date, '%Y-%m'),
                vdc.date
            )
        from dual
    ) as date, (
        SELECT
            SUM(invx.invoice_amount)
        from invoice invx
        WHERE
            invx.project_code = inv.project_code
            AND DATE_FORMAT(invx.invoice_date, '%Y-%m') <= DATE_FORMAT(inv.invoice_date, '%Y-%m')
    ) as running_invoice_amount, (
        SELECT
            IF(
                vdca.amount IS NULL,
                0,
                SUM(vdca.amount)
            )
        from
            v_direct_cost vdca
        where
            vdca.date <= vdc.date
            and vdca.project_code = p.project_code
    ) as direct_cost, (
        SELECT
            ROUND(
                invoice_amount / (
                    SELECT
                        SUM(invoice_amount)
                    FROM
                        invoice
                    WHERE
                        invoice.invoice_date = inv.invoice_date
                ) * (
                    SELECT
                        IF(amount IS NULL, 0, SUM(amount))
                    from
                        v_general_cost
                    where
                        date = DATE_FORMAT(inv.invoice_date, '%Y-%m')
                )
            )
        FROM
            dual
    ) as general_cost, (
        SELECT
            ROUND(
                invoice_amount / (
                    SELECT
                        SUM(invoice_amount)
                    FROM
                        invoice
                    WHERE
                        invoice.invoice_date = inv.invoice_date
                ) * (
                    SELECT
                        IF(amount IS NULL, 0, SUM(amount))
                    from
                        v_overhead_cost
                    where
                        date = DATE_FORMAT(inv.invoice_date, '%Y-%m')
                )
            )
        FROM
            dual
    ) as overhead_cost, (
        SELECT (
                direct_cost + general_cost + overhead_cost
            )
        from
            dual
    ) as total_cost, (
        SELECT (
                running_invoice_amount - total_cost
            )
    ) as EBIT
from invoice inv
    LEFT JOIN v_direct_cost vdc ON (
        DATE_FORMAT(inv.invoice_date, '%Y-%m') = vdc.date AND inv.project_code = vdc.project_code
    )
    JOIN project p ON (
        inv.project_code = p.project_code
    )
WHERE vdc.date IS NULL;