---
layout: default
title: "Compatibility"
---

<ol><li><a href='/index'><span>ares</span></a></li><li><a href='/compatibility'><span>compatibility</span></a></li></ol>

## Compatibility

Due to the number of systems and games ares supports, we have not been able to play every game to completion.

While we believe that the list of 'Working' titles is accurate, some issues may have slipped through the net.

If you encounter any problems, please let us know by either creating an issue on
[GitHub](https://github.com/ares-emulator/ares/issues) or updating the compatibility list.


NOTE: This compatibility list is currently work-in-progress, don't be alarmed by the unexpectly low numbers for some systems

<table>
  <tr>
    <th class="default-sort">System</th>
    <th style="text-align: right">Untested</th>
    <th style="text-align: right">Not Working</th>
    <th style="text-align: right">Partially Working</th>
    <th style="text-align: right">Working</th>
    <th style="text-align: right">Working (%)</th>
  </tr>

  {% for system in site.data.romsets %}
    {% assign system_name = system[0] %}

    {% assign working = 0 %}
    {% assign partially_working = 0 %}
    {% assign not_working = 0 %}    
    {% assign unknown = 0 %}
    {% for game in site.data.compatibility[system_name].games %}
      {% if game[1].status == 'Working' %}
        {% assign working = working | plus:1 %}
      {% endif %}
      {% if game[1].status == 'Not Working' %}
        {% assign not_working = not_working | plus:1 %}
      {% endif %}
      {% if game[1].status == 'Partially Working' %}
        {% assign partially_working = partially_working | plus:1 %}
      {% endif %}
    {% endfor %}

    <tr>
        <td>
            <a href="/compatibility/{{system[1].header.name}}">{{ system[1].header.name }}</a>
        </td>
        <td style="text-align: right; color: orange;">
            {{ system[1].games.size | minus: working | minus: not_working | minus: partially_working }}
        </td>
        <td style="text-align: right; color: red;">
            {{ not_working }}
        </td>
        <td style="text-align: right; color: orange;">
            {{ partially_working }}
        </td>
        <td style="text-align: right; color: green;"> 
            {{ working }}
        </td>
        <td style="text-align: right"> 
            {{ working | times: 1.0 | divided_by: system[1].games.size | times: 100 | round: 2}}
        </td>
    </tr>

  {% endfor %}
</table>
