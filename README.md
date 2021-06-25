# The Sanguanel web application #
<img src="/readme_src/imgs/desktop_home.png"/>
<br/>

This is a personal project that is already done and working at [sanguanel.com](https://sanguanel.com);<br/>
I spent almost exactly one **month** on this entire project.<br/>
<br/>
<br/>

## About it ##
I was looking to learn Laravel and Vue.JS, so... why not learn these technologies in practice? Of course, I already knew something about them, but nothing compared with what I know now.<br/>
I tried to attach my passion for mead with the knowledge that I was looking for. Now, the project is a web platform with a **database system, a CRUD model, user authentication, an admin system**, and other things that you will see...<br/>
If you want, you can use all of the source code, just (of course) change the brand and theme colors, because it is already a **registered brand**.

<img src="/readme_src/imgs/desktop_article.png">


## The application ##
The app works as this following way:<br/>
The users have an *admin level* which means how influential the changes they can do at the database are. The importance of this is that all articles and some *homes/subhomes* contents are rendered by using the database.<br/>
The relevance of each level is:<br/>

1. **Level 0 - 2:** Common users without privileges;   
2. **Level 3:** They can see the articles and users database, and require the publishing of an article;
3. **Level 4:** The admin master. Can change any data at DB, any page, and publish any articles;

Here you can see some pages of these admin functions:<br/>

<img src="/readme_src/imgs/desktop_adminhome.png"/>

<img src="/readme_src/imgs/desktop_adminhome4.png"/>

<img src="/readme_src/imgs/desktop_adminalterar.png"/>

<img src="/readme_src/imgs/warning.png">


#### Database when Admin ####
When you're an admin, you can simply create your articles. The app uses regex to read the text that you sent and convert it to readable HTML. 
You must follow the formatting rules that are explained in the pop-up. To see this pop-up, you must press the ***info button*** beside the input label. 
The pop-up:

<img src="/readme_src/imgs/desktop_popup.png"/>

For example: when you put a paragraph between "**@@**" the app transforms it into a ***p*** tag with the class ***simple_p***. All articles are written are saved in the same DB's table, and when called, they are rendered into an ***article*** tag using the ***v-HTML*** vue's directive. Because of it, the navigation between articles is really quicky, because the only thing to be required is the article's HTML.

<img src="/readme_src/imgs/desktop_institucional.png">


#### The search system ####
I'm still talking about regex. All articles that are created, must fill the *keywords* field.
When the admin save, for example the keywords: "Caipirinha de melomel de maçã, drinks, hidromel", the server transform it into an array like it:
(caipirinha,de,melomel,maca,drinks,hidromel). When the user uses the search field the same thing happens. So, to show right results the app travel both arrays looking for some equal keyword. If yes: it shows; if not: don't.

<img src="/readme_src/imgs/desktop_searchlist.png">


#### Technologies ####
The application uses Laravel with Jetstream and Fortify in addition to Inertia using VueJS. It turned possible to reuse code (the components) and build it above a robust structure.

<img src="/readme_src/imgs/desktop_register.png">


#### Responsivity ####
The website is already responsive there is some printscreens:

<img src="/readme_src/imgs/mobile_menu.png">

<img src="/readme_src/imgs/mobile_home.png">

<img src="/readme_src/imgs/mobile_article.png">



