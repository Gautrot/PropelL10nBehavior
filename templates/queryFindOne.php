/**
* Finds the first object in the query with the given filter
*
* Example usage:
* <code>
* $query->findBy<?= $columnPhpName ?>('fooValue'); //
WHERE <?= $columnName ?> = 'fooValue'
* $query->findBy<?= $columnPhpName ?>('%fooValue%'); //
WHERE <?= $columnName ?> LIKE '%fooValue%'
* </code>
*
* @param     string $<?= $columnName ?> The value to use as filter.
*              Accepts wildcards (* and % trigger a LIKE)
* @param     string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
* @param     string|null $locale Overwrites the locale for this filter
*
* @return    <?= $objectClassName ?>|null The result
*/
public function findOneBy<?= $columnPhpName ?>(string $<?= $columnName ?> , ?string $comparison = null, ?string $locale = null): ?<?= $objectClassName ?>
{
return $this->filterBy<?= $columnPhpName ?>($<?= $columnName ?> , $comparison, $locale)
->findOne();
}
