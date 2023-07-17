<?php
/**
 * Напишіть класс TextEditor, який буде імітувати роботу друкарської машинки.
 * У цього класу має бути 4 методи:
 * -addCharacter(string $character): self — додає символ до контенту.
 *  -Якщо було передано більше, ніж один символ, то додає ПЕРШИЙ символ із набору.
 *  -Якщо було передано ЖОДНОГО символу, то генерує помилку.
 * -addLine(string $line): self — додає символи до контенту та додатково додає PHP_EOL (кінець рядку).
 * -addHeading(string $heading): self — додає заголовок до контенту (<h1>) та пустий рядок у кінці.
 * -Якщо був переданий пустий рядок, то генерує помилку.
 * -toString(): string — повертає ВЕСЬ доданий контент.
 *
 * Методи класу addCharacter(), addLine() та addHeading() мають бути реалізовані з використанням Fluent Interface.
 */

class TextEditor
{

    /**
     * Heading for our text
     *
     * @var string
     */
    protected string $heading;

    /**
     * All content
     *
     * @var string
     */
    protected string $content;

    /**
     * Init default values for variables
     */
    public function __construct()
    {
        $this->heading = '';
        $this->content = '';
    }

    /**
     * Adding heading to the content
     *
     * @param string $heading Heading text.
     *
     * @return TextEditor
     */
    public function add_heading(string $heading): TextEditor
    {
        try {
            if (empty($heading)) {
                throw new ErrorException('Heading empty.');
            }
        } catch (Exception $exception) {
            echo 'Error: ' . $exception->getMessage() . PHP_EOL;
        }

        $this->heading = ucfirst($heading);

        return $this;
    }

    /**
     * Adding line to the content
     *
     * @param string $line New line for the text.
     *
     * @return TextEditor
     */
    public function add_line(string $line): TextEditor
    {
        $this->content .= $line . PHP_EOL;

        return $this;
    }

    /**
     * Adding just one character to the content
     *
     * @param string $character New character.
     *
     * @return TextEditor
     */
    public function add_character(string $character): TextEditor
    {
        try {
            if (empty($character) || 0 >= strlen($character)) {
                throw new ErrorException('Character is empty.');
            }
        } catch (Exception $exception) {
            echo 'Error: ' . $exception->getMessage() . PHP_EOL;
        }

        $this->content .= $character[0];

        return $this;
    }

    /**
     * Return all content in one string
     *
     * @return string
     */
    public function to_string(): string
    {
        return '<h1>' . $this->heading . '</h1>' . PHP_EOL . $this->content;
    }

}

$poem = new TextEditor();
$poem->add_heading('Some simble poem here with fish text')
    ->add_line('here one example ot long line.')
    ->add_character('an')
    ->add_character('n')
    ->add_character('danio')
    ->add_character('_')
    ->add_character('c')
    ->add_character('h')
    ->add_character('a')
    ->add_character('r')
    ->add_character('a')
    ->add_character('c')
    ->add_character('t')
    ->add_character('e')
    ->add_character('r');

echo $poem->to_string();