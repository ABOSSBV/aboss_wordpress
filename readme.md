# ABOSS Events
This Wordpress plugin allows you to add your upcoming events from ABOSS agency
or ABOSS Artist to your Wordpress through a Widget or Shortcode.

## Installation
1. Install the ABOSS Events plugin by uploading the files to your Wordpress /wp-content/plugins/ folder
2. Activate the plugin in your WordPress Admin
3. Add your API Key that you can find in your personal ABOSS account (Profile Settings -> Authentication Token)
4. Add a widget to your Wordpress website or use the Shortcode to add events to your Wordpress pages

## Shortcode
You can use a shortcode (aboss-events) within any wordpress page or post.
To add the ABOSS events from a specific project to your page, use:

    [aboss-events project_id="10" title="Project 10" display_ticket_links="yes"]
    
To add ABOSS events from your all your agency projects (ABOSS Agency only), use:

    [aboss-events title="All Artists" display_ticket_links="yes"]

#### Attributes
- project_id
  - The ID of the project from ABOSS you'd like to display
- title
  - Text displayed on top
- display_ticket_links
  - [yes/no] - Select yes to add a link to the event name with the ticketlink from ABOSS
- date_format (Available in small-widget only)
  - Change the format of the date displayed. (Date format info: http://php.net/manual/en/function.date-format.php)
- template
  - Build and select your own template by adding the filename from a file in the directory lib/aboss/partials/widget_templates

#### Contributors
Simon de la Court, Michael Abdulai, Thomas van Beek

## License
    Copyright (c) 2016 ABOSS B.V.

    Permission is hereby granted, free of charge, to any person
    obtaining a copy of this software and associated documentation
    files (the "Software"), to deal in the Software without
    restriction, including without limitation the rights to use,
    copy, modify, merge, publish, distribute, sublicense, and/or sell
    copies of the Software, and to permit persons to whom the
    Software is furnished to do so, subject to the following
    conditions:

    The above copyright notice and this permission notice shall be
    included in all copies or substantial portions of the Software.

    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
    EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
    OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
    NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
    HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
    WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
    FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
    OTHER DEALINGS IN THE SOFTWARE.
