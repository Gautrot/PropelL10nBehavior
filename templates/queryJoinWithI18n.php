/**
 * Adds a JOIN clause to the query and hydrates the related I18n object.
 * Shortcut for `$c->joinI18n($locale)->with()`
 *
 * @param string|null $locale Locale to use for the join condition, e.g. 'fr_FR'
 * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'. Defaults to left join.
 *
 * @return $this|<?= $queryClass; ?> The current query, for fluid interface
 * @throws PropelException
 */
public function joinWithI18n(?string $locale = null, ?string $joinType = Criteria::LEFT_JOIN)
{
    if ($locale === null) {
        $locale = $this->getLocale();
    }
    if ($locale === null) {
        $locale = PropelL10n::getLocale();
    }
    $this->joinI18n($locale, null, $joinType)
        ->with('<?= $i18nRelationName; ?>');
    $this->with['<?= $i18nRelationName; ?>']->setIsWithOneToMany(false);

    return $this;
}

