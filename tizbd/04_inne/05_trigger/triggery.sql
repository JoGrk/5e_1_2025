CREATE TABLE salary_changes(
    employee_id INT NOT NULL,
    changed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    old_salary DECIMAL(9,2) NOT NULL,
    new_salary DECIMAL(9,2) NOT NULL,
    PRIMARY KEY (employee_id, changed_at),
    FOREIGN KEY (employee_id) REFERENCES employees(employee_id)
        ON DELETE CASCADE ON UPDATE CASCADE
);

DELIMITER $$
CREATE TRIGGER before_update_salary
BEFORE UPDATE ON employees
FOR EACH ROW
BEGIN
    IF NOT OLD.salary = NEW.salary THEN
    INSERT INTO salary_changes
    (employee_id, old_salary, new_salary)
    VALUES
    (OLD.employee_id, OLD.salary, NEW.salary);
    END IF;
END; $$
DELIMITER;

SELECT employee_id, first_name, last_name, salary
FROM employees
WHERE employee_id = 110;

UPDATE employees
SET salary = salary * 1.05
WHERE employee_id = 110;

SELECT *
FROM salary_changes
WHERE employee_id = 110;