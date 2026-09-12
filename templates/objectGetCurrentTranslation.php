/**
 * Returns the current translation
 *
 * @param string|null $locale Locale to use for the join condition, e.g. 'fr_FR'
 * @param ConnectionInterface|null $con an optional connection object
 *
 * @return <?= "$i18nTablePhpName\n"; ?>
 * @throws PropelException
 */
public function getCurrentTranslation(?string $locale = null, ?ConnectionInterface $con = null): <?= "$i18nTablePhpName\n"; ?>
{
    $locale = $this->resolveLocale($locale);

    return $this->getTranslation($locale, $con);
}
