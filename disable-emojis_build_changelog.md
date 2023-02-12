### 1.0.1

#### 1.0.1
* Release.

#### 1.0.1-b2
* ACP-Modul:
  * Altes Modul mit manuellem Modus entfernt und neu im automatischen Modus hinzugefügt.
* Neue Migration.

#### 1.0.1-b1
* ACP-Modul:
  * Umgestellt auf Controller.
* ACP-Template:
  * Umbenannt.
  * Twig: `spaceless` Tag entfernt und durch `spaceless` Filter und Whitespace Modifier ersetzt.
  * Toggle Farben von EMP übernommen.
* PHP Mindestversion auf 7.1 erhöht und Maximalversion auf 8.2 erhöht:
  * `composer.json` angepasst.
  * `ext.php` angepasst.

### 1.0.0

#### 1.0.0
* GH Release.
* Updateprüfung eingefügt.
* EC Fehler behoben.
* Kommentarblock in allen Dateien aktualisiert.

#### 1.0.0-b4
* Im CSS fehlte für Responsive ein Abstand für `dd` nach oben, wie es bei LFWWH und EMP gemacht wurde. (Meldung Kirk)
* Kleine Änderungen im ACP-Template
* Sprachdateien:
  * Korrekturen.
  * Sprachvariablen umbenannt.
  * Für die S9E Meldung eigene Sprachdatei angelegt.

#### 1.0.0-b3
* Option "Alles entfernen ohne Hinweis" wieder entfernt. Bereits der Prototyp hatte nicht alles entfernt, sondern immer den Emoji Code stehen lassen. (Vorschlag Kirk)
* Kleine Änderungen in den Sprachdateien.

#### 1.0.0-b2
* Fix: Im Listener war beim Laden der Sprachdatei im Parameter für die Ext ein `\` statt einem `/` notiert. Im lokalen TB funktionierte das trotzdem, darum nicht aufgefallen. (Meldung Kirk)
* Fix: Im ACP-Modul funktionierte Reset nicht, da ich das Template von StatsPerm übernommen hatte und dort der Button anders gehandhabt wird.
* Fix: Im ACP-Modul fehlte das schliessende `fieldset` Tag, wodurch die Buttonleiste innerhalb der Einstellungsgruppe dargestellt wurde, statt ausserhalb.
* Im Kommentarblock war in mehreren Dateien noch der Block von StatsPerm vorhanden.
* Im Nav-Bereich war noch die englische Bezeichnung der Ext vorhanden.
* Kleine Änderungen in den Sprachdateien.

#### 1.0.0-b1
* Initial Git Release.
* Erste Beta
