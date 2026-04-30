# 💪 GymPro – Webové stránky fitness centra

> Dokumentace návrhu struktury webových stránek fitness centra **GymPro**.  
> Téma: **Posilovna a fitness centrum**

---

## 📋 Obsah

- [Popis projektu](#popis-projektu)
- [Mapa stránek](#mapa-stránek)
- [Popis podstránek](#popis-podstránek)
- [Kontaktní formulář](#kontaktní-formulář)
- [Blog](#blog)
- [Použité HTML tagy](#použité-html-tagy)
- [Technologie](#technologie)

---

## Popis projektu

**GymPro** je webový projekt zaměřený na prezentaci fitness centra. Web slouží k informování návštěvníků o službách, cenách, lektorech a aktualitách. Obsahuje rezervační formulář, blog s fitness tipy a galerii.

---

## Mapa stránek
Home (Hlavní stránka)
│
├── O nás
├── Služby
│   ├── Osobní trénink
│   ├── Skupinové lekce
│   └── Výživové poradenství
├── Ceník
├── Lektoři
├── Galerie
├── Blog
│   ├── Článek 1 – Jak začít s posilováním
│   ├── Článek 2 – Nejlepší cviky na záda
│   ├── Článek 3 – Správná výživa pro růst svalů
│   └── Článek 4 – Jak sestavit tréninkový plán
└── Kontakt


> **Celkový počet podstránek: 13** ✅

---

## Popis podstránek

### 1. 🏠 Home – Hlavní stránka

Úvodní stránka webu. Obsahuje:

- **Hero sekci** s hlavním sloganem a CTA tlačítkem („Začni dnes")
- Stručný přehled služeb
- Aktuální akce a slevy
- Odkaz na blog a ceník

---

### 2. ℹ️ O nás

Informace o fitness centru:

- Historie a vznik GymPro
- Mise a hodnoty
- Fotografie prostorů
- Tým a vedení

---

### 3. 🏋️ Služby

Přehled všech nabízených služeb s krátkými popisy a odkazem na podstránky.

#### 3a. Osobní trénink
Individuální tréninkový plán sestavený na míru. Lektor pracuje 1:1 s klientem.

#### 3b. Skupinové lekce
Lekce jako spinning, kruhový trénink, jóga, zumba. Rozpis v týdenním rozvrhu.

#### 3c. Výživové poradenství
Konzultace s výživovým poradcem, sestavení jídelníčku dle cílů klienta.

---

### 4. 💰 Ceník

| Služba | Cena / měsíc | Poznámka |
|---|---|---|
| Základní členství | 599 Kč | Volný vstup do posilovny |
| Prémiové členství | 999 Kč | Vstup + 2 skupinové lekce |
| Osobní trénink | 700 Kč / hod | Individuální lekce |
| Výživové poradenství | 500 Kč | Jednorázová konzultace |
| Studentské členství | 399 Kč | Platný ISIC nutný |

---

### 5. 👤 Lektoři

Představení jednotlivých lektorů a trenérů:

- Jméno, foto, specializace
- Certifikace a zkušenosti
- Odkaz na rezervaci lekce

---

### 6. 🖼️ Galerie

Fotogalerie fitness centra:

- Prostory posilovny
- Skupinové lekce v akci
- Zákazníci a jejich výsledky (se souhlasem)

---

### 7. 📝 Blog

Výpis fitness článků s popisy. Viz sekce [Blog](#blog) níže.

---

### 8. 📞 Kontakt

Kontaktní stránka s formulářem. Viz sekce [Kontaktní formulář](#kontaktní-formulář) níže.

---

## Kontaktní formulář

### Popis formuláře

Formulář slouží k odeslání dotazu, rezervaci nebo zpětné vazbě. Odesílání zajišťuje **PHP skript** (`send.php`), validace probíhá v **JavaScriptu** i na straně serveru.

### Povinné prvky formuláře

| Pole | Typ | Povinné | Popis |
|---|---|---|---|
| Jméno a příjmení | `text` | ✅ Ano | Celé jméno zákazníka |
| E-mail | `email` | ✅ Ano | Kontaktní e-mail |
| Telefon | `tel` | ❌ Ne | Nepovinné telefonní číslo |
| Předmět | `select` | ✅ Ano | Dotaz / Rezervace / Stížnost |
| Zpráva | `textarea` | ✅ Ano | Text zprávy (min. 20 znaků) |
| Souhlas s GDPR | `checkbox` | ✅ Ano | Podmínky zpracování údajů |
| Odeslat | `submit` | – | Tlačítko pro odeslání |

### Ukázka kódu formuláře (HTML)

```html
<!DOCTYPE html>
<html lang="cs">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kontakt – GymPro</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
  <nav>
    <ul>
      <li><a href="index.html">Home</a></li>
      <li><a href="kontakt.html">Kontakt</a></li>
    </ul>
  </nav>
</header>

<main>
  <section id="kontakt">
    <h1>Kontaktujte nás</h1>
    <p>Máte dotaz nebo zájem o členství? Napište nám!</p>

    <form action="send.php" method="POST" id="kontaktni-formular">

      <fieldset>
        <legend>Osobní údaje</legend>

        <label for="jmeno">Jméno a příjmení *</label>
        <input type="text" id="jmeno" name="jmeno" placeholder="Jan Novák" required>

        <label for="email">E-mail *</label>
        <input type="email" id="email" name="email" placeholder="jan@email.cz" required>

        <label for="telefon">Telefon</label>
        <input type="tel" id="telefon" name="telefon" placeholder="+420 123 456 789">
      </fieldset>

      <fieldset>
        <legend>Zpráva</legend>

        <label for="predmet">Předmět *</label>
        <select id="predmet" name="predmet" required>
          <option value="">-- Vyberte --</option>
          <option value="dotaz">Dotaz</option>
          <option value="rezervace">Rezervace</option>
          <option value="stiznost">Stížnost</option>
          <option value="jine">Jiné</option>
        </select>

        <label for="zprava">Zpráva *</label>
        <textarea id="zprava" name="zprava" rows="6"
          placeholder="Napište svou zprávu..." required minlength="20"></textarea>

        <label>
          <input type="checkbox" name="gdpr" required>
          Souhlasím se zpracováním osobních údajů dle GDPR *
        </label>
      </fieldset>

      <button type="submit">Odeslat zprávu</button>

    </form>
  </section>
</main>

<footer>
  <p>&copy; 2025 GymPro. Všechna práva vyhrazena.</p>
  <address>
    GymPro s.r.o., Fitness ulice 42, Praha 1
  </address>
</footer>

<script src="validace.js"></script>
</body>
</html>
```

---

## Blog

### Výpis článků

Stránka blogu zobrazuje seznam článků seřazených od nejnovějšího. Každý článek má nadpis, datum, stručný popis a odkaz „Číst více".

---

#### 📄 Článek 1 – Jak začít s posilováním

**Datum:** 10. 5. 2025  
**Autor:** Tomáš Kovář  
**Popis:**  
Průvodce pro naprosté začátečníky. Jak si nastavit cíle, jaké cviky zvolit jako první a jak se vyhnout nejčastějším chybám v posilovně. Článek obsahuje ukázkový tréninkový plán na první měsíc.

---

#### 📄 Článek 2 – Nejlepší cviky na záda

**Datum:** 3. 5. 2025  
**Autor:** Lucie Marková  
**Popis:**  
Zdravá záda jsou základ. V tomto článku najdete 10 nejefektivnějších cviků pro posílení zad, správnou techniku provedení a tipy, jak předcházet zraněním při cvičení.

---

#### 📄 Článek 3 – Správná výživa pro růst svalů

**Datum:** 25. 4. 2025  
**Autor:** Martin Blažek  
**Popis:**  
Co jíst před a po tréninku? Kolik bílkovin denně potřebujete? Tento článek rozebírá základy sportovní výživy, doplňky stravy a jak sestavit jídelníček pro maximální svalový přírůstek.

---

#### 📄 Článek 4 – Jak sestavit tréninkový plán

**Datum:** 15. 4. 2025  
**Autor:** Tomáš Kovář  
**Popis:**  
Trénovat bez plánu je jako řídit bez mapy. Naučíme vás, jak sestavit efektivní týdenní tréninkový plán podle vašich cílů – ať už chcete hubnout, nabírat svaly nebo zlepšit kondici.

---

### Ukázka kódu výpisu článků (HTML)

```html
<article>
  <header>
    <h2><a href="clanek1.html">Jak začít s posilováním</a></h2>
    <time datetime="2025-05-10">10. května 2025</time>
    <span class="autor">Autor: Tomáš Kovář</span>
  </header>
  <p>
    Průvodce pro naprosté začátečníky. Jak si nastavit cíle,
    jaké cviky zvolit jako první a jak se vyhnout nejčastějším chybám...
  </p>
  <footer>
    <a href="clanek1.html">Číst více &rarr;</a>
  </footer>
</article>
```

---

## Použité HTML tagy

Přehled všech použitých HTML tagů dle učebnice na [publi.cz](https://publi.cz/books/6332/index.html#Cover):

### Strukturální a sémantické tagy

| Tag | Popis použití |
|---|---|
| `<!DOCTYPE html>` | Deklarace typu dokumentu |
| `<html>` | Kořenový element stránky |
| `<head>` | Hlavička dokumentu |
| `<body>` | Tělo dokumentu |
| `<header>` | Záhlaví stránky / sekce |
| `<footer>` | Zápatí stránky / sekce |
| `<main>` | Hlavní obsah stránky |
| `<nav>` | Navigační menu |
| `<section>` | Tematická sekce obsahu |
| `<article>` | Samostatný článek / příspěvek |
| `<aside>` | Postranní panel (tipy, reklamy) |
| `<div>` | Obecný blokový kontejner |
| `<span>` | Obecný řádkový element |

### Tagy pro text a nadpisy

| Tag | Popis použití |
|---|---|
| `<h1>` až `<h6>` | Nadpisy různých úrovní |
| `<p>` | Odstavce textu |
| `<strong>` | Tučný důležitý text |
| `<em>` | Kurzíva / zdůraznění |
| `<br>` | Zalomení řádku |
| `<hr>` | Horizontální oddělovač |
| `<blockquote>` | Citace / zvýrazněný citát |
| `<pre>` | Předformátovaný text |
| `<code>` | Kód inline |
| `<abbr>` | Zkratka s vysvětlením |
| `<address>` | Kontaktní adresa |
| `<time>` | Datum a čas |
| `<mark>` | Zvýrazněný text |
| `<small>` | Drobné poznámky, copyright |

### Tagy pro seznamy

| Tag | Popis použití |
|---|---|
| `<ul>` | Nečíslovaný seznam (navigace, výhody) |
| `<ol>` | Číslovaný seznam (kroky tréninku) |
| `<li>` | Položka seznamu |
| `<dl>` | Seznam definic (pojmy ve výživě) |
| `<dt>` | Definovaný výraz |
| `<dd>` | Definice výrazu |

### Tagy pro formuláře

| Tag | Popis použití |
|---|---|
| `<form>` | Formulářový kontejner |
| `<fieldset>` | Skupina polí formuláře |
| `<legend>` | Popis skupiny polí |
| `<label>` | Popisek pole formuláře |
| `<input>` | Vstupní pole (text, email, tel, checkbox, submit) |
| `<textarea>` | Víceřádkové textové pole |
| `<select>` | Rozbalovací seznam |
| `<option>` | Položka výběru |
| `<button>` | Tlačítko |

### Tagy pro média a odkazy

| Tag | Popis použití |
|---|---|
| `<a>` | Hypertextový odkaz |
| `<img>` | Obrázek |
| `<figure>` | Obrázek s popisem |
| `<figcaption>` | Popis obrázku |
| `<video>` | Video (ukázky cviků) |
| `<audio>` | Audio (motivační hudba) |
| `<source>` | Zdroj pro video/audio |
| `<picture>` | Responzivní obrázky |

### Tagy pro tabulky

| Tag | Popis použití |
|---|---|
| `<table>` | Tabulka (ceník, rozvrh lekcí) |
| `<thead>` | Hlavička tabulky |
| `<tbody>` | Tělo tabulky |
| `<tfoot>` | Zápatí tabulky |
| `<tr>` | Řádek tabulky |
| `<th>` | Záhlavní buňka |
| `<td>` | Datová buňka |
| `<caption>` | Nadpis tabulky |

### Tagy pro meta a hlavičku

| Tag | Popis použití |
|---|---|
| `<meta>` | Metadata (charset, viewport, description) |
| `<title>` | Název záložky prohlížeče |
| `<link>` | Připojení CSS souboru |
| `<script>` | Připojení JS souboru |
| `<style>` | Inline CSS styly |

---

## Technologie

Projekt využívá tyto technologie:

- **HTML5** – struktura a obsah stránek
- **CSS3** – vizuální stylování a responzivní design
- **JavaScript** – validace formuláře, interaktivní prvky, animace
- **PHP** – zpracování formuláře, dynamický obsah blogu

---

*Dokumentace vypracována jako součást školního projektu – návrh struktury webových stránek.*
