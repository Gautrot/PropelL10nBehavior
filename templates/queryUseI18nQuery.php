/**
* Use the I18n relation query object
*
* @see       useQuery()
*
* @param string|null $locale Locale to use for the join condition, e.g. 'fr_FR'
* @param string|null $relationAlias optional alias for the relation
* @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'. Defaults to left join.
*
* @return <?= $queryClass ?> A secondary query class using the current class as primary query
*/
public function useI18nQuery(?string $locale = null, ?string $relationAlias = null, ?string $joinType = Criteria::LEFT_JOIN): <?= $queryClass ?>
{
if ($locale === null) {
$locale = PropelL10n::getLocale();
}
return $this
->joinI18n($locale, $relationAlias, $joinType)
->useQuery($relationAlias ? $relationAlias : '<?= $i18nRelationName ?>', '<?= $namespacedQueryClass ?>');
}
