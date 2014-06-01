<?php

abstract class AttributeAccessBaseTest extends \PHPUnit_Framework_TestCase
{
    const TEST_VALUE = 'foobar';

    public function testAttributeAccessGetterSetter()
    {
        $subjectOfTest = $this->getSubjectOfTest();

        $reflectionClass = new \ReflectionObject($subjectOfTest);

        $properties = $reflectionClass->getProperties();

        foreach ($properties as $property) {
            $setterName = 'set' . $property->getName();

            if (method_exists($subjectOfTest, $setterName)) {
                $subjectOfTest->$setterName(self::TEST_VALUE);

                $this->assertAttributeEquals(
                    self::TEST_VALUE,
                    $property->getName(),
                    $subjectOfTest,
                    sprintf('Setting property %s failed', $property->getName())
                );
            }

            $getterName = 'get' . $property->getName();
            if (method_exists($subjectOfTest, $getterName)) {

                $property->setAccessible(true);
                $property->setValue($subjectOfTest, self::TEST_VALUE);
                $property->setAccessible(false);

                $this->assertEquals(
                    self::TEST_VALUE,
                    $subjectOfTest->$getterName(),
                    sprintf('Gettimg property %s failed', $property->getName())
                );
            }
        }
    }

    protected abstract function getSubjectOfTest();
}
