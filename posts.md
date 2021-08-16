---
layout: default
title: "Posts"
---

<ol><li><a href='/index'><span>ares</span></a></li><li><a href='/posts'><span>posts</span></a></li></ol>

<ul>
  {% for post in site.posts %}
    <div class='post'><p><a href='{{ post.url }}'>{{ post.date | date: "%F %R" }}</a><br><a style='color: inherit;' href='{{ post.url }}'>{{ post.title }}</a></p>
      {{ post.content }}
    </div>
  {% endfor %}
</ul>