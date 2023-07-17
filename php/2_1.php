<?php
/**
 * Опишіть класс Employee, де будуть такі властивості:
 * -Ім’я;
 * -Посада;
 * -Зарплатня.
 *
 * Доступ до всіх властивостей має бути за допомогою окремих методів.
 * -Метод, що встановлює ім’я класу має генерувати помилку, якщо передане пусте значення;
 * -Метод, що встановлює зарплатню має генерувати помилку, якщо буде передане значення, що дорівнює 0 або меньше його.
 */

class Employee
{

    /**
     * Name of the employee
     *
     * @var string
     */
    protected string $name;

    /**
     * Role of this employee
     *
     * @var string
     */
    protected string $role;

    /**
     * Size of salary for this role
     *
     * @var int
     */
    protected int $salary;

    /**
     * Build class with needed parameters
     *
     * @param string $name Username.
     * @param string $role Name fo the position.
     * @param int $salary Size of salary.
     */
    public function __construct(string $name = 'username', string $role = ' developer', int $salary = 2600)
    {
        $this->set_name($name);
        $this->set_role($role);
        $this->set_salary($salary);
    }

    /**
     * Set username for employee
     *
     * @param string $name
     *
     * @return void
     */
    public function set_name(string $name): void
    {
        try {
            if (empty($name)) {
                throw new ErrorException('Username must be filled.');
            }
        } catch (Exception $exception) {
            echo 'Error: ' . $exception->getMessage() . PHP_EOL;
        }

        $this->name = $name;
    }

    /**
     * Set role for employee
     *
     * @param string $role Role of employee.
     *
     * @return void
     */
    public function set_role(string $role): void
    {
        try {
            if (empty($role)) {
                throw new ErrorException('Role must be filled.');
            }
        } catch (Exception $exception) {
            echo 'Error: ' . $exception->getMessage() . PHP_EOL;
        }

        $this->role = $role;
    }

    /**
     * Set salary for employee
     *
     * @param int $salary Role of employee.
     *
     * @return void
     */
    public function set_salary(int $salary): void
    {
        try {
            if (empty($salary) || 0 >= $salary) {
                throw new ErrorException('Salary must be bigger that zero.');
            }
        } catch (Exception $exception) {
            echo 'Error: ' . $exception->getMessage() . PHP_EOL;
        }

        $this->salary = $salary;
    }

    /**
     * Get username of employee
     *
     * @return string
     */
    public function get_name(): string
    {
        return ucfirst($this->name);
    }

    /**
     * Get role of employee
     *
     * @return string
     */
    public function get_role(): string
    {
        return $this->role;
    }

    /**
     * Get salary of employee
     *
     * @return string
     */
    public function get_salary(): string
    {
        return number_format($this->salary, 2);
    }

}

$designer = new Employee('nikolay', 'designer', 1300);
echo $designer->get_name() . ' the ' . $designer->get_role() . ' with salary $' . $designer->get_salary() . PHP_EOL;

$developer = new Employee('michael', 'developer', 2300);
echo $developer->get_name() . ' the ' . $developer->get_role() . ' with salary $' . $developer->get_salary() . PHP_EOL;