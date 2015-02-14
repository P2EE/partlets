Partlets
========

Partlets are self contained building block for web applications.
These components help you to develop your application in a faster and more encapsulated way then
the "old" single controller/template per page pattern.

MVC Like
--------

Partlets could be used in a MVC approach when you have one Partlet per page.
You can define all you requirements you need to display the content of a page.

HMVC Like
---------

The strentgh of partlets are the "Preparable" base, so that they can define requirements.
A requirement can be another partlet, so that you can build a single page out of different
self contained and reusable blocks.


Page Structure with partlets
----------------------------

      +----------------------------------------------------------------+
      | Toplevel Page Partlet                                          |
      |----------------------------------------------------------------|
      |                                                                |
      | +--------------+  +------------------------------------------+ |
      | |Menu Partlet  |  |List Partlet                              | |
      | |--------------|  |------------------------------------------| |
      | |              |  | +--------------------------------------+ | |
      | |              |  | |ListItem Partlet                      | | |
      | |              |  | |--------------------------------------| | |
      | |              |  | |                                      | | |
      | |              |  | |                                      | | |
      | |              |  | |                                      | | |
      | |              |  | +--------------------------------------+ | |
      | |              |  |                                          | |
      | |              |  | +--------------------------------------+ | |
      | |              |  | |ListItem Partlet                      | | |
      | |              |  | |--------------------------------------| | |
      | |              |  | |                                      | | |
      | |              |  | |                                      | | |
      | |              |  | |                                      | | |
      | |              |  | |                                      | | |
      | |              |  | +--------------------------------------+ | |
      | +--------------+  +------------------------------------------+ |
      |                                                                |
      +----------------------------------------------------------------+

Resources
---------

* https://speakerdeck.com/bastianhofmann/marrying-front-with-backend
* http://www.youtube.com/watch?v=fqULJBBEVQE
* http://www.infoq.com/presentations/Evolution-of-Code-Design-at-Facebook
