<?php

/**
 * Спускайте ниже до строки === Начинать отсюда === и следуйте инструкциям там
 */

if( file_exists("./first.txt") ) { unlink("./first.txt"); }
if( file_exists("./second.txt") ) { unlink("./second.txt"); }

interface FileHelperInterface
{
    /**
     * Метод предназначен для добавления текста к файлу
     * Реализуйте этот метод при помощи функции file_put_contents, но учтите что он должен добавлять к файлу текст
     * а не перетирать его, обратитесь к документации
     *
     * Для манипуляции с текущим файлом используйте путь до фала из контекста $this и свойства $path
     *
     * @param string $text у метода есть аргумент, в котором содержится текст для добавления
     * @return bool метод должен возвращать true если мы записали данные успешно или false если что-то пошло не так
     */
    public function append ($text);

    /**
     * Метод предназначен для переименования файла
     * Реализуйте этот метод при помощи функции rename()
     *
     * Для манипуляции с текущим файлом используйте путь до фала из контекста $this и свойства $path
     *
     * @param string $newName аргумент должен принимать новое имя файла
     * @return bool метод должен возвращать true если мы успешно переименовали файл или false если что-то пошло не так
     */
    public function rename ($newName);

    /**
     * Метод предназначен для удаления файла
     * Реализуйте этот метод при помощи функции unlink()
     *
     * Для манипуляции с текущим файлом используйте путь до фала из контекста $this и свойства $path
     *
     * @return bool метод должен возвращать true если мы успешно удалил файл или false если что-то пошло не так
     */
    public function delete ();

    /**
     * Метод предназначен для создания файла
     * Реализуйте этот метод при помощи функции touch()
     *
     * Для манипуляции с текущим файлом используйте путь до фала из контекста $this и свойства $path
     *
     * @return bool метод должен возвращать true если мы успешно создали файл или false если что-то пошло не так
     */
    public function create ();
}

abstract class BaseFileHelper
{
    // эта переменная создана для проверки правильности выполнения задания
    private $pathPrivate;

    /**
     * Этот конструктор является родительским, поэтому его нужно будет вызвать в конструкторе основого класса
     * @param null $void этот аргумент сделан для проверки вашего задания и должен быть просто null
     * @param string $path сюда вы должны передать путь до файла, который вы получили в основном конструкторе класса
     */
    public function __construct ($void, $path)
    {
        if($void !== null) {
            throw new \Exception("Родительский конструктор не был вызван корректно");
        }

        $this->pathPrivate = $path;
    }

    /**
     * Метод проверяет существование файла
     * @return bool возвращает true если файл существует, false в случае ошибки
     */
    public function exists()
    {
        return file_exists($this->path);
    }

    /**
     * Метод читает файл и выводит его содержимое
     * @return bool|string метод возвращает текст, если файл был существует, false если возникла ошибка
     */
    public function get()
    {
        if( $this->exists() ) {
            return file_get_contents($this->path);
        }
        return false;
    }

    /**
     * Проверяет, был ли правильно вызван родительский конструктор
     */
    public function check()
    {
        return isset($this->path) && !empty($this->pathPrivate) && $this->path == $this->pathPrivate;
    }

    /**
     * Этот метод просто выкидывает исключение
     */
    public function throwException ()
    {
        throw new \Exception("Ошибка! нужно её поймать", 444);
    }
}

/**
 * === Начинать отсюда ===
 *
 * Вам нужно будет создать класс с именем FileHelper и реализовать (имплементировать implements) интерфейс
 * FileHelperInterface, также ваш класс должен наследовать (extends) от BaseFileHelper
 *
 * Для описания того, что вам нужно имплементировать в классе, смотрите на объявления interface FileHelperInterface { ... }
 * и abstract class BaseFileHelper { ... } выше
 *
 * Наш класс это хелпер который помогает нам работать с файлом по пути который мы ему передадим при создании экземпляра класса
 * через new, пример: new FileHelper("Путь до файла")
 *
 * Как вы уже догадались у нас в FileHelper должен быть конструктор __construct($path) в котором должен быть путь до файла
 *
 * При объявлении конструктора вам нужно будет создать свойство в классе FileHelper под именем $path и задать модификатор, при котором
 * его значение будет доступно в рамках всех классов которые взаимодействуют с друг другом по наследованию, а именно FileHelper и BaseFileHelper
 *
 * Также переданное значение через входящий аргумент $path нужно записать в свойство класса FileHelper $path через контекст $this
 *
 * Также в конструкторе вы должны будет вызвать родительский конструктор первым аргументом передать null, вторым значение $path
 */


/**
 * Теперь создайте экземпляр класса FileHelper с переданным аргументом "./first.txt" используя слово new
 * дальше запишите созданный экземпляр (объект) в переменную $first
 */

if( isset( $first ) ) {

    if( isset( $first->path ) ) {

        echo '<p>Беда! свойство path публичное, такого быть не должно! Не нарушаем инкапсуляцию!</p>';
    }

    if( !( $first instanceof FileHelperInterface ) ) {

        echo '<p>Экземпляр класса $first не поддерживает интерфейс FileHelperInterface</p>';

    } else if( !( $first instanceof BaseFileHelper ) ) {

        echo '<p>Экземпляр класса $first не наследует BaseFileHelper</p>';

    } else {

        if( !$first->check() ) {

            echo '<p>Родительский конструктор не вызван или вы забыли записать путь $path в свойство класса $path</p>';

        } else {

            /**
             * Вызовите у объекта $first метод create(), метод должен создать файл "./first.txt"
             */

            if( !$first->exists() ) {

                echo '<p>Файл ./first.txt не существует, метод create() реализован неправильно или метод create() не был вызван</p>';
                exit();
            }

            /**
             * Вызовите у объекта $first метод append("Первая попытка"), метод должен добавить в файл "./first.txt" текст "Первая попытка"
             */

            /**
             * Вызовите у объекта $first метод append(" удалась!"), метод должен добавить в файл "./first.txt" текст " удалась!", файл должен содержать строку "Первая попытка удалась!"
             */

            if( $first->get() !== 'Первая попытка удалась!' ) {

                echo '<p>Метод append() реализован неправильно или не был вызван выше</p>';
                exit();
            }

            /**
             * Вызовите у объекта $first метод rename("./second.txt"), метод должен переименовать файл из "./first.txt" в "./second.txt"
             */
        }
    }

    /**
     * Теперь создайте экземпляр класса FileHelper с переданным аргументом "./second.txt" используя слово new
     * дальше запишите созданный экземпляр (объект) в переменную $second
     */

    if( isset( $second ) ) {

        if ($second instanceof BaseFileHelper) {

            if( !$second->exists() ) {

                echo '<p>Файл ./second.txt не существует, значит метод rename() был реализован неверно или не был вызван выше</p>';
                exit();
            }

            /**
             * Вызовите у объекта $second метод delete(), метод должен удалить файл "./second.txt"
             */

            if( $second->exists() ) {

                echo '<p>Файл ./second.txt существует, значит метод delete() был реализован неверно или не был вызван выше</p>';
                exit();
            }
        }

        /**
         * Создайте переменную $exception и установите ей значение true
         */

        if( isset( $exception ) ) {

            if( $exception !== true ) {

                echo '<p>Переменная $exception существует, но имеет значение отличное от true</p>';
                exit();
            }

            /**
             * Создайте переменную $success и установите ей значение 0
             */

            if(isset($success) && $success === 0) {
                /**
                 * Поймайте исключение вызванное этим методом при помощи конструкций try {} catch () {}
                 * при этом запишите код ошибки в переменную $success
                 */
                $second->throwException();

                if( isset( $success ) ) {

                    if( $success === 444 ) {

                        echo '<p>Вы успешны, задание выполнено!</p>';
                    }
                }

            } else {

                echo '<p>Переменная $success пока еще не создана, не обязательно исправлять сразу, делайте всё по мере прочтения вниз</p>';
            }

        } else {

            echo '<p>Переменная $exception пока еще не создана, не обязательно исправлять сразу, делайте всё по мере прочтения вниз</p>';
        }

    } else {

        echo '<p>Экземпляр класса FileHelper в переменной $second еще не создан, не обязательно исправлять сразу, делайте всё по мере прочтения вниз</p>';
    }

} else {

    echo '<p>Экземпляр класса FileHelper в переменной $first еще не создан, не обязательно исправлять сразу, делайте всё по мере прочтения вниз</p>';
}