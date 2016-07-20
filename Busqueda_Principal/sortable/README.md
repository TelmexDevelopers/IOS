MooTools Table Sorter 0.9.5
===============================
TableSorter is a high-configurable class for resorting data tables by column. It also comes stock with a handy-dandy pagination system. Other sorters work with whats already in the DOM, but TableSorter sends a request back to the server each time an action (sort or page) is performed.

![Screenshot](http://www.cnizz.com/mootools/table-sorter/table-sorter.png)

How to use
----------------------

Create the object after including table-sorter.js in HTML source document

                sorter = new TableSorter({
                        request: 'action', 
                        action: 'returnGeoHtmlTableStr', 
                        destination: 'XhrDump', 
                        prev: 'PagePrev', 
                        next: 'PageNext', 
                        head: 'GeoHead',
                        rows: 100,
                        startWait: "",
                        endWait: ""
                });

Demo: http://cnizz.com/mootools/table-sorter/ 
Doc: http://blog.cnizz.com/2010/05/31/mootools-table-sorter-0-9-5-for-sorting-mysql-data-via-xhr-and-looking-good-doing-it/

request - this is the name of the GET variable (ie. $_GET['action']) that your server-side code will look for.
action - this is the value of your request (if your request is called action, then $_GET['action'] == 'returnGeoHTMLTableStr')
destination - this is the destination ID of the element in the DOM (your HTML code) where the string will be inserted.
prev / next - you should not need to change these.  The class adds events to the Prev and Next elements.  Do not change unless there is a name collission.
head - this is the name of the head of your head element in the table.  Where all your TH tags are set.  This is important, the class looks at these to create events.
rows - how many rows per page?
startWait / startEnd - optional javascript functions that should be called before and after execution of a sort.

Check out the demo http://cnizz.com/mootools/table-sorter/ it is important to use the TableSorter.class.php file.  This will show you how to implement the server-side
code.  Anyother questions please go to cnizz.com

Demo: <a href="http://cnizz.com/mootools/table-sorter/">http://cnizz.com/mootools/table-sorter/</a>
Doc: <a href="http://blog.cnizz.com/2010/05/31/mootools-table-sorter-0-9-5-for-sorting-mysql-data-via-xhr-and-looking-good-doing-it/">http://blog.cnizz.com/2010/05/31/mootools-table-sorter-0-9-5-for-sorting-mysql-data-via-xhr-and-looking-good-doing-it/</a>
 
