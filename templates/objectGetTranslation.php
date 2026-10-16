/**
 * Returns the current translation for a given locale
 *
 * @param string|null $<?= $localeVariableName; ?> Locale to use for the translation, e.g. 'fr_FR'
 * @param ConnectionInterface|null $con an optional connection object
 *
 * @return <?= "$i18nTablePhpName\n"; ?>
 * @throws PropelException
 */
public function getTranslation(?string $<?= $localeVariableName; ?> = null, ?ConnectionInterface $con = null): <?= "$i18nTablePhpName\n"; ?>
{
    if ($<?= $localeVariableName; ?> === null) {
        $<?= $localeVariableName; ?> = $this->resolveLocale($<?= $localeVariableName; ?>);
    }

    if (!isset($this->currentTranslations[$<?= $localeVariableName; ?>])) {
        if ($this-><?= $i18nListVariable; ?> !== null) {
            foreach ($this-><?= $i18nListVariable; ?> as $translation) {
                if ($translation->get<?= $localeColumnName; ?>() === $<?= $localeVariableName; ?>) {
                    $this->currentTranslations[$<?= $localeVariableName; ?>] = $translation;

                    return $translation;
                }
            }
        }

        if ($this->isNew()) {
            $translation = new <?= $i18nTablePhpName; ?>();
            $translation->set<?= $localeColumnName; ?>($<?= $localeVariableName; ?>);
        } else {
            $translation = <?= $i18nQueryName; ?>::create()
                ->filterByPrimaryKey([$this->getPrimaryKey(), $<?= $localeVariableName; ?>])
                ->findOneOrCreate($con);
            $this->currentTranslations[$<?= $localeVariableName; ?>] = $translation;
        }

        $formerLocale = $this->currentLocale;
        $this->add<?= $i18nSetterMethod; ?>($translation);
        $this->currentLocale = $formerLocale;
    }

    return $this->currentTranslations[$<?= $localeVariableName; ?>];
}

