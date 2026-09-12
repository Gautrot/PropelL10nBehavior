/**
* Adds a JOIN clause to the query using the i18n relation
*
* @param string|null $locale Locale to use for the join condition, e.g. 'fr_FR'
* @param string|null $relationAlias optional alias for the relation
* @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'. Defaults to left join.
*
* @return <?php echo $queryClass ?> The current query, for fluid interface
*/
public function joinI18n(?string $locale = null, ?string $relationAlias = null, ?string $joinType = Criteria::LEFT_JOIN)
{
if ($locale === null) {
$locale = PropelL10n::getLocale();
}
$relationName = $relationAlias ? $relationAlias : '<?php echo $i18nRelationName ?>';

return $this
->join<?php echo $i18nRelationName ?>($relationAlias, $joinType)
->addJoinCondition($relationName, $relationName . '.<?php echo $localeColumn ?> = ?', $locale);
}
