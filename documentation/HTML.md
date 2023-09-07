# HTML

HTML is short for 'hypertext markup language' and is used to create websites.
An HTML document consists of two major parts:

* the head (name of page; shown at tab)
* the body (content of website)

- structure of website without style

## Layout

- head
  - title of page
  - links to fonts etc. are in here
  - metadata
    - specify character set
    - author
    - description of website
    - keywords
    - viewport settings
- style
  - defined by <style></style>
  - to style your website without CSS file
    - for specific things (not the whole website)
- body
  - whole content of website is in here
    - some CSS/JS too
- script
  - defined by <script></script>
  - for backend things, for example where you need a loop
- comments
  - \<!--This is a comment-->
  - use to structure document
    - not to much
    - so much that another person knows what this is about

## Forms

- label, input, options, textarea
  - defined by <form></form>
  - input types
    - text (one-line text field)
    - radio (select one of x choices)
    - checkbox (select 0-x of x choices)
    - submit (button to submit the form)
    - button (button)
    - etc.
- POST/GET
  - request data
  - POST
    - not visible in URL
    - not cached
    - not in browser history
    - -> for example for password
  - GET
    - visible in URL
    - cached
    - in browser history
    - -> for general things
- buttons
  - submit
    - submits the form
    - usually reloads the page
- multimedia
  - images
    - \<img scr="">
  - favicon
    - in <head>
      - \<link ...>
- tables
  - th
    - header of table
  - tr
    - row of table
  - td
    - cell in a table
  - structure
    - \<tr>\<th>\</th>\</tr>\<tr>\<td>\</td>\</tr>