<?php

namespace model;

use Gossi\Propel\Behavior\L10n\PropelL10n;
use PHPUnit\Framework\TestCase;
use Product;
use ProductI18nQuery;
use ProductQuery;
use Propel\Generator\Util\QuickBuilder;

/**
 * # ProductTest
 */
class ProductTest extends TestCase
{
    /**
     * @return void
     */
    public static function setUpBeforeClass(): void
    {
        if (!class_exists('Product')) {
            $schema = <<<XML
<database name="l10n_behavior">
	<table name="product">
		<column name="id" required="true" primaryKey="true" autoIncrement="true" type="integer" />
		<column name="title" type="varchar" required="true" />
		
		<behavior name="l10n">
			<parameter name="i18n_columns" value="title" />
		</behavior>
	</table>
</database>
XML;

            QuickBuilder::buildSchema($schema);
        }

        PropelL10n::setLocale('en'); // just reset, may be changed in other tests
        PropelL10n::setFallback('en');
        PropelL10n::setDependencies([
            'de-CH' => 'de-DE',
            'de-AT' => 'de-DE',
            'de-DE' => 'en-US',
            'ja' => 'en-US'
        ]);
    }

    /**
     * @return void
     */
    public function testDefaultLocale(): void
    {
        $p = new Product();

        self::assertNull($p->getLocale());

        $p->setTitle('delicious');
        self::assertEquals('delicious', $p->getTitle());
        self::assertEquals('en', $p->getCurrentTranslation()->getLocale());
    }

    /**
     * @return void
     */
    public function testDependency(): void
    {
        $p = new Product();
        $p->setLocale('de-DE');
        $p->setTitle('lecker');

        self::assertEquals('lecker', $p->getTitle('de-CH'));
    }

    /**
     * @return void
     */
    public function testPrimaryLanguage(): void
    {
        $p = new Product();
        $p->setLocale('ja');
        $p->setTitle('おいしい');

        self::assertEquals('おいしい', $p->getTitle('ja-JP'));
    }

    /**
     * @return void
     */
    public function testFallback(): void
    {
        $p = new Product();
        $p->setLocale('en');
        $p->setTitle('delicious');
        $p->setLocale('de');
        $p->setTitle('lecker');

        self::assertEquals('delicious', $p->getTitle('it'));
    }

    /**
     * @return void
     */
    public function testSetterLocale(): void
    {
        $p = new Product();
        $p->setTitle('delicious', 'en');
        $p->setTitle('bene', 'it');

        self::assertEquals('delicious', $p->getTitle('en-US'));
        self::assertEquals('bene', $p->getTitle('it-IT'));
    }

    /**
     * @return void
     */
    public function testLocaleTagChain(): void
    {
        PropelL10n::addDependency('it-IT', 'en');
        $p = new Product();
        $p->setTitle('bene', 'it');
        $p->setTitle('good', 'en');

        self::assertEquals('bene', $p->getTitle('it-IT'));
    }

    /**
     * @return void
     */
    protected function setUp(): void
    {
        ProductQuery::create()->deleteAll();
        ProductI18nQuery::create()->deleteAll();
    }
}
