<?php

use Gossi\Propel\Behavior\L10n\PropelL10n;
use PHPUnit\Framework\TestCase;

/**
 * # PropelL10nTest
 */
class PropelL10nTest extends TestCase
{
    /**
     * @return void
     */
    public function testAddDependency(): void
    {
        PropelL10n::addDependency('de-DE', 'en-US');

        self::assertTrue(PropelL10n::hasDependency('de-DE'));
        self::assertEquals(['de-DE' => 'en-US'], PropelL10n::getDependencies());
    }

    /**
     * @return void
     */
    public function testRemoveDepedency(): void
    {
        PropelL10n::addDependency('de-DE', 'en-US');
        PropelL10n::removeDependency('de-DE');

        self::assertCount(0, PropelL10n::getDependencies());
    }

    /**
     * @return void
     */
    public function testSetDependencies(): void
    {
        $deps = [
            'de-DE' => 'en-US',
            'de-CH' => 'de-DE',
            'ja-JP' => 'en-US'
        ];

        PropelL10n::setDependencies($deps);

        self::assertEquals(2, PropelL10n::countDependencies('de-CH'));
        self::assertEquals(0, PropelL10n::countDependencies('it-IT'));
        self::assertEquals($deps, PropelL10n::getDependencies());
    }

    /**
     * @return void
     */
    public function testCurrentLocale(): void
    {
        self::assertEquals('en', PropelL10n::getLocale());

        PropelL10n::setLocale('de-DE');
        self::assertEquals('de-DE', PropelL10n::getLocale());
    }
}
