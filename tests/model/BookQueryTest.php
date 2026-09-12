<?php

namespace model;

use Book;
use BookI18nQuery;
use BookQuery;
use Gossi\Propel\Behavior\L10n\PropelL10n;
use PHPUnit\Framework\TestCase;
use Propel\Generator\Util\QuickBuilder;
use Propel\Runtime\Exception\PropelException;

/**
 * # BookQueryTest
 */
class BookQueryTest extends TestCase
{
    /**
     * @return void
     */
    public static function setUpBeforeClass(): void
    {
        if (!class_exists(Book::class)) {
            $schema = <<<XML
<database name="l10n_behavior" defaultIdMethod="native">
	<table name="book">
		<column name="id" required="true" primaryKey="true" autoIncrement="true" type="integer" />
		<column name="title" type="varchar" required="true" />
		<column name="author" type="varchar" />
	
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
     * @throws PropelException
     */
    public function testFilter(): void
    {
        $q = BookQuery::create();
        $q->filterByTitle('Lord of the Rings');
        $b = $q->findOne();

        self::assertNotNull($b);
        self::assertEquals('Herr der Ringe', $b->getTitle('de'));
    }

    /**
     * @return void
     * @throws PropelException
     */
    public function testFind(): void
    {
        $q = BookQuery::create();
        $books = $q->findByTitle('Harry Potter%');

        self::assertCount(2, $books);
    }

    /**
     * @return void
     * @throws PropelException
     */
    public function testFindOne(): void
    {
        $q = BookQuery::create();
        $b = $q->findOneByTitle('Harry Potter%');

        self::assertNotNull($b);
        self::assertEquals('Harry Potter und der Stein der Weisen', $b->getTitle('de'));
    }

    /**
     * @return void
     * @throws PropelException
     */
    public function testLocales(): void
    {
        $q = BookQuery::create();
        $q->setLocale('de');
        $q->filterByTitle('Herr der Ringe');
        $b = $q->findOne();

        self::assertNotNull($b);

        $q = BookQuery::create();
        $q->setLocale('de');
        $q->filterByTitle('Yubiwa Monogatari', null, 'ja-latn-JP');
        $b = $q->findOne();

        self::assertNotNull($b);
    }

    /**
     * @return void
     * @throws PropelException
     */
    protected function setUp(): void
    {
        // reset db contents
        BookQuery::create()->deleteAll();
        BookI18nQuery::create()->deleteAll();

        // fill in some dummy data

        // lord of the rings
        $b = new Book();
        $b->setTitle('Lord of the Rings');
        $b->setTitle('Herr der Ringe', 'de');
        $b->setTitle('Yubiwa Monogatari', 'ja-latn-JP');
        $b->save();

        // harry potter
        $b = new Book();
        $b->setTitle("Harry Potter and the Philosopher's Stone");
        $b->setTitle('Harry Potter und der Stein der Weisen', 'de');
        $b->setTitle('Harī Pottā to kenja no ishi', 'ja-latn-JP');
        $b->save();

        $b = new Book();
        $b->setTitle('Harry Potter and the Prisoner of Azkaban');
        $b->setTitle('Harry Potter und der Gefangene von Askaban', 'de');
        $b->setTitle('Harī Pottā to Azukaban no shūjin', 'ja-latn-JP');
        $b->save();
    }
}
