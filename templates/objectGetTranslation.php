/**
* Returns the current translation for a given locale
*
* @param string|null $locale Locale to use for the translation, e.g. 'fr_FR'
* @param ConnectionInterface|null $con an optional connection object
*
* @return <?= $i18nTablePhpName ?>
*/
public function getTranslation(?string $locale = null, ?ConnectionInterface $con = null): <?= $i18nTablePhpName ?>
{
if ($locale === null) {
$locale = PropelL10n::getLocale();
}
if (!isset($this->currentTranslations[$locale])) {
if (null !== $this-><?= $i18nListVariable ?>) {
foreach ($this-><?= $i18nListVariable ?> as $translation) {
if ($translation->get<?= $localeColumnName ?>() == $locale) {
$this->currentTranslations[$locale] = $translation;

return $translation;
}
}
}
if ($this->isNew()) {
$translation = new <?= $i18nTablePhpName ?>();
$translation->set<?= $localeColumnName ?>($locale);
} else {
$translation = <?= $i18nQueryName ?>::create()
->filterByPrimaryKey(array($this->getPrimaryKey(), $locale))
->findOneOrCreate($con);
$this->currentTranslations[$locale] = $translation;
}
$this->add<?= $i18nSetterMethod ?>($translation);
}

return $this->currentTranslations[$locale];
}
