/**
 * Adds a JOIN clause to the query using the i18n relation
 *
 * @param string|null $locale Locale to use for the join condition, e.g. 'fr_FR'
 * @param string|null $relationAlias optional alias for the relation
 * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'. Defaults to left join.
 *
 * @return <?= $queryClass; ?> The current query, for fluid interface
 * @throws PropelException
 */
public function joinI18n(?string $locale = null, ?string $relationAlias = null, ?string $joinType = Criteria::LEFT_JOIN): <?= "$queryClass\n"; ?>
{
    $locale = $this->resolveLocale($locale);

    $relationName = $relationAlias ?: '<?= $i18nRelationName; ?>';

    return $this->join<?= $i18nRelationName; ?>($relationAlias, $joinType)
        ->addJoinCondition($relationName, $relationName . '.<?= $localeColumn; ?> = ?', $locale);
}

