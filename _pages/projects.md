---
title: Projects
layout: default
permalink: /projects/
---
{% if site.data.projects.ongoing_projects %}
<h2 style="font-size:30px;">On-going Projects</h2>
{% endif %}

<div class="project-container">
{% for project in site.data.projects.ongoing_projects %}
   {% include project.html
      title         = project.title
      date          = project.date
      tags          = project.tags
      description   = project.description
      url           = project.url
   %}
{% endfor %}
</div>

<h2 style="font-size:30px;">Completed Projects</h2>

<div class="project-container">
{% for project in site.data.projects.completed_projects %}
   {% include project.html
      title         = project.title
      date          = project.date
      tags          = project.tags
      description   = project.description
      url           = project.url
   %}
{% endfor %}
</div>
