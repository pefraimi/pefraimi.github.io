---
title: Awards and Distinctions
layout: default
permalink: /awards/
---


<div id="particles-js">
</div>

<div class="project-container">
{% for award in site.data.awards %}
   {% include award.html
      title         = award.title
      description   = award.description
      place         = award.place
      url           = award.url
   %}
{% endfor %}
</div>
