---
title: Courses
layout: default
permalink: /courses/
lang: 'en'
---

<h2>Undergraduate Studies Program</h2>

{% for course in site.data.courses.undergraduate_courses %}
   {% include course.html
      title         = course.title
      description   = course.description
      eclass        = course.eclass
      moodle        = course.moodle
      info          = course.info
      semester      = course.semester
   %}
{% endfor %}

<h2>Postgraduate Studies Program</h2>

{% for course in site.data.courses.postgraduate_courses %}
   {% include course.html
      title         = course.title
      description   = course.description
      eclass        = course.eclass
      moodle        = course.moodle
      info          = course.info
      semester      = course.semester
   %}
{% endfor %}
