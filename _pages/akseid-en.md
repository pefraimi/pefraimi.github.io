---
title: AKSEID
layout: default
permalink: /akseid-en/
back: _pages/projects.md
languages:
  - lang: "en"
    page: _pages/akseid-en.md
  - lang: "el"
    page: _pages/akseid-el.md
---

### Assessment of News Reliability in Social Networks of Influence

&emsp;*Duration: April 2018 – January 2020*

The rapid spread of the internet in the modern world creates new channels for the exchange of information and news amongst its users. Established news organizations and numerous individuals have at their disposal modern media that allow them to spread news and opinions to a wide audience while each internet user can be informed directly from any source in the world about what is happening. The formation of public opinion has taken on a new dimension as the volume of news and the speed of its dissemination change the rules of the game that have been established for decades.

However, the channels of news and opinions dissemination are not devoid of drawbacks and risks. The lack of authentication mechanisms for users who publish their views allows fake news to spread. In addition, the need for news sources to increase the traffic in their websites, and consequently their revenues, often leads to the publication of articles with provocative titles of questionable validity in order to impress readers and, thus, calling into question their objectivity. Many claim that uninhibited dissemination of news contributes to the formation of more thorough and valid public opinion, but the frequent phenomena of fake and misleading news necessitate further investigation of this claim.

<div class="wp-caption aligncenter">
    <img class="aligncenter" src="/assets/akseid/degroot-graph.png"/>
    <p class="wp-caption-text">Figure 1: The influence factors for each news source from the parliamentary groups. Data from Twitter on Greek political news media scene in April 2018.</p>
</div>

The aim of this research was to clearly formulate the concepts of bias and validity as well as to evaluate them on an online news dissemination graph. Our research data came from a popular online social network (OSN). Modern algorithms from the field of graph theory were used for the analysis of the data and the opinions’ propagation patterns, while widespread models of opinion dynamics were utilized for node classification and the study and calculation of the concepts of bias and validity.

The innovation of our research was based on the use of modern algorithms and concepts for the study of opinion diffusion and, in particular, the quality of news. In our research we adapted recent concepts to a case study of a popular OSN focusing on the Greek news media scene and, with the use of algorithms from different scientific fields, we evaluated its complex features. Our research was based on publicly available data and we studied graph-theoretically complex concepts such as objectivity in the modern news landscape.

### Course of Research and Results

Initially we set as a goal to study the political information that is inherent in the structure of the OSNs. The aim of our study focused on the verification of the existence of political information as well as the analysis of its quality. We considered that this stage would underpin the subsequent steps of our research as the potential existence of information would validate our approach to assessing objectivity.

We chose Twitter as the main OSN at focus and considered the Greek political scene as the framework of study. The reasons that led to selection of the particular OSN are related to the unprecedented presence and influence of Twitter on political events worldwide and to the possibilities it offers for the extraction of publicly available data. After a thorough investigation we determined the nodes of interest (NOIs) related to the Greek political scene. Specifically, we considered the elected members of the then active Greek Parliament (April 2018) as well as the media (media) with national coverage and political content as suitable hubs for extracting political information. Through the available Twitter Developer Platform functionalities, we compiled a dataset that contained exclusively the selected nodes and the links to their followers. The motivation for choosing the specific types of data (i.e. the follower-followee relations) stemmed from our assumption that the structure of relations between users of the network suffice to capture and extract useful information. In addition, focusing on the followers of the NOIs reinforces our claim for the existence of intrinsic information as these nodes cannot select the users who follow them.

In our first approach of analysis, we applied popular classification algorithms to investigate whether a user-follower’s connections to NOIs could be used to predict its connection to other NOIs. The basic idea of our approach is summed up in the saying “Show me your friends so I can tell you who you are” or, in its most appropriate version for our case, “Show me who you follow so I can predict who else you follow”. The results of our experiments confirmed our hypothesis of the existence of useful information. Indicatively, Figure 2 shows the correlation factors of the results obtained from experiments that predict connections between users and parties. A more detailed description of the experiments and presentation of the results can be found in the relevant publication {% cite briola_2018 %}.

<div class="wp-caption aligncenter">
    <div class="akseid-figure-flex">
        <div><img src="/assets/akseid/exp8-parties.png"/></div>
        <div><img src="/assets/akseid/exp8-politicians.png"/></div>
    </div>
    <p class="wp-caption-text">Figure 2: Graph of the correlation coefficients regarding the political party (left) and the politicians (right) followed by a user. Data from Twitter on Greek political and news media scene in April 2018.</p>
</div>

A second analysis approach of the dataset involved its representation in terms of graphs. The relations between the NOIs and their followers were considered as edges of a bipartite graph with two subsets of nodes, the first containing the NOIs and the second their followers. By applying projections to the subset of NOIs and using a wide range of weighting functions, we created complete graphs containing only the nodes of interest, which allowed us to apply algorithms from other research fields and extract the correlation coefficients between these nodes. In particular, by applying clustering algorithms, we formed groups of nodes for the elected members and juxtaposed the results with the Parliamentary Groups to which they belong. Figure 3 shows the result of the clustering algorithm where the number of each node corresponds to the Parliamentary Group to which it belongs while its color indicates the group to which it was classified by the algorithm.

<div class="wp-caption aligncenter">
    <img class="aligncenter" src="/assets/akseid/akseid-clustering.jpg"/>
    <p class="wp-caption-text">Figure 3: Results of the clustering algorithm. Data from Twitter on Greek political and news media scene in April 2018.</p>
</div>

Besides the clustering algorithm approach, we applied an estimation technique of the minimum linear arrangement problem in order to place the nodes of the members in the one-dimensional space. Our motivation for this approach was to compare the result with the left – right political axis and to deduce a possible correlation between them. Figure 4 shows the result of our approach in comparison to the optimal placement of Parliamentary Groups regarding our result. A more detailed presentation of the experiments and the results can be found in the relevant publication {% cite stamatelatos_2018 %}.

<div class="wp-caption aligncenter">
    <img class="aligncenter" src="/assets/akseid/minla-politicians.png"/>
    <p class="wp-caption-text">Figure 4: MP placement stripe (top) based on our estimation for solution of  the minimum linear arrangement problem and Parliamentary Group placement stripe (bottom) similar to the result of our experiment. Data from Twitter on Greek political and news media scene in April 2018.</p>
</div>

Motivated by the nature of our data, we utilized a popular model from the field of opinion dynamics in order to assess the influence factors of both MPs and the news media from the parliamentary parties. The DeGroot model has been applied to a variety of cases for the analysis of political data. In particular, the projections that emerged from our dataset were interpreted in terms of social networks where opinions are diffused amongst the nodes. Based on the DeGroot model with stubborn nodes, we were able to estimate the influence factors and analyze complex issues such as the political impartiality of the news media. Figure 1 shows the influence factors of the news sources by the parliamentary parties while Figure 5 depicts the ranking of the news media based on their degree of impartiality, as it was estimated by our technique. More detailed details are available in the relevant publications {% cite stamatelatos_2020 gyftopoulos_2020 %}.

<div class="wp-caption aligncenter">
    <img class="aligncenter" src="/assets/akseid/impartiality-ranking.png"/>
    <p class="wp-caption-text">Figure 5: Ranking of the news media based on the responses from eight (8) political scientists (top) and ranking of the media based on the factors of influence that were estimated by the DeGroot analysis (bottom). Data from Twitter on Greek political and news media scene in April 2018.</p>
</div>

### Publications

{% bibliography --cited %}
