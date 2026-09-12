/**
* Filters the query with the
*
* Example usage:
* <code>
* $query->filterBy<?= $columnPhpName ?>('fooValue'); //
WHERE <?= $columnName ?> = 'fooValue'
* $query->filterBy<?= $columnPhpName ?>('%fooValue%'); //
WHERE <?= $columnName ?> LIKE '%fooValue%'
* </code>
*
* @param     string $<?= $columnName ?> The value to use as filter.
*              Accepts wildcards (* and % trigger a LIKE)
* @param     string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
* @param     string|null $locale Overwrites the locale for this filter
*
* @return    <?= $queryClass ?> The current query, for fluid interface
*/
public function filterBy<?= $columnPhpName ?>(string $<?= $columnName ?> , ?string $comparison = null, ?string $locale = null): <?= $queryClass ?>
{
if ($locale === null) {
$locale = $this->get<?= $localeColumnName ?>();
}
if ($locale === null) {
$locale = PropelL10n::getLocale();
}

if (null === $comparison) {
if (is_array($<?= $columnName ?>)) {
$comparison = Criteria::IN;
} elseif (preg_match('/[\%\*]/', $<?= $columnName ?>)) {
$token = str_replace('*', '%', $<?= $columnName ?>);
$comparison = Criteria::LIKE;
}
}

return $this->useI18nQuery($locale)
->filterBy<?= $columnPhpName ?>($<?= $columnName ?> , $comparison)
->endUse();
}
