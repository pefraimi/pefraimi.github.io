---
title: People
layout: default
permalink: /people/
---

{% for member in site.data.members.active_members %}
   {% include member.html
      name         = member.name
      interests    = member.interests
      image        = member.image
      bio          = member.bio
      title        = member.title
      mail         = member.mail
      web          = member.web
      linkedin     = member.linkedin
      github       = member.github
      researchgate = member.researchgate
   %}
{% endfor %}

### Affiliated Member

{% for member in site.data.members.affiliated_members %}
   {% include member.html
      name         = member.name
      interests    = member.interests
      image        = member.image
      bio          = member.bio
      title        = member.title
      mail         = member.mail
      web          = member.web
      linkedin     = member.linkedin
      github       = member.github
      researchgate = member.researchgate
   %}
{% endfor %}

### Alumni (PhD)

<div class="full-width-table">
   <table>
      <thead>
         <tr>
            <th>Name</th>
            <th>Graduation</th>
            <th>Thesis</th>
         </tr>
      </thead>
      <tbody>
      {% for member in site.data.members.alumni_members %}
         <tr>
            <td>{{ member.name }}</td>
            <td>{{ member.graduation }}</td>
            <td><a href="{{ member.thesis_link }}" target="_blank">{{ member.thesis_title }}</a></td>
         </tr>
      {% endfor %}
      </tbody>
   </table>
</div>
