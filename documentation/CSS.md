# CSS

CSS means 'cascading style sheets' and is used to individualise websites. This can be achieved by:

* changing the background color
* changing the text color
* changing the font
* changing the text size
* doing something when, for example, clicked into a field
* and many more

## Structure

- syntax

```css
/*This is a comment*/
/*It can even be a
multiline comment*/

/*design for the document*/
body {
    /*content*/
    /*Example:*/
    background-color: white; /*sets background color*/
    color: black; /*sets font color*/
}

h1 {
    /*content*/
}

/*design for elements with class element*/
.element {
    /*content*/
}

/*design for element with id element*/
#element {
    /*content*/
}
```

- body, .element and #element are a selector
- background-color and color are properties
- white and black are the values of the properties

```html
<!--external CSS file-->
<link href="style.css" rel="stylesheet">

<!--internal CSS part-->
<style>
    /*content*/
</style>

<!--inline CSS content-->
<div class="mainpart" style="color: blue">
    <!--content-->
</div>
```

- selectors
    - type
        - selects elements of type
      ```css
      /*select all paragraphs*/
      p {
      }
      ```
    - class
        - select elements by class
    - ID
        - select element by ID
    - attribute
        - select elements with specific attributes
      ```css
      /*select all elements with title test*/
      [title="test"] {
      }
      ```
    - pseudo selector
        - defines state of element
            - pseudo class
          ```css
          /*when a is hovered*/
          a:hover {
          }
          ```
            - pseudo element
          ```css
          /*first line of paragraph*/
          p::first-line {
          }
          ```

## Background

- colors

```css
body {
    /*set color with name*/
    background-color: white;
    /*set color with hex*/
    background-color: #ffffff;
    /*set color with rgb*/
    background-color: rgb(255, 255, 255);
}
```

- images

```css
body {
    background-image: url("url");
}
```

- position
    - sets starting position of background image

```css
body {
    background-position: center top;
    background-position: 5px 5px;
}
```

## Borders

- basics

```css
body {
    /*border style*/
    border-style: solid;

    /*border width*/
    border-width: 5px;

    /*border color*/
    border-color: dodgerblue;
}
```

- images

```css
body {
    /*image as border*/
    border-image: url("url");
}
```

- tables

```css
table {
    /*set the color of the border*/
    border-color: dodgerblue;
    /*collapse the outline border*/
    border-collapse: collapse;
}
```

- rounded corners

```css
image {
    /*rounds the corners by 5px*/
    border-radius: 5px;
    /*rounds the corners by 50%, the outline is now a circle*/
    border-radius: 50%;
}
```

## Box-Shadow

```css
textarea {
    /*black shadow*/
    box-shadow: black;
    /*shadow is moved 8px to bottom and right, 16px blurred, 0 spread radius, color black, 0.2% transparency*/
    box-shadow: 8px 8px 16px 0 rgba(0, 0, 0, 0.2);
    /*multiple shadows*/
    box-shadow: 5px 5px red, 7px 7px yellow;
}
```

## Positioning

- types
    - static
        - positioned by normal flow of website
    - relative
        - positioned relative to normal position
            - bottom, right, etc. will move the element
    - absolute
        - positioned relative to nearest ancestor
    - fixed
        - stays in the same position on the screen when scrolled
    - sticky
        - based on scroll position
            - the element is not always on the users screen
- z-index
    - defines what is in the fore-/background
- float and clear
    - float
        - element float on a given side
    - clear
        - if element is next to another element, clear can bring it under it