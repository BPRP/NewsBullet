<section id="Campaign">
    <h2 class="section-title">Your campaigns</h2>
    <form id="FormCampaign" action="post">
        <ul class="create-card">
            <li class="one">
                <input name="campaign_object" placeholder="Object" type="text">
            </li>
            <li class="two">
                <select name="campaign_list" id="CreateCampaignListing">
                    <option value=""></option>
                </select>
            </li>
            <li class="three">
                <input name="campaign_body" multiple="false" accept=".html" type="file">
            </li>
            <li class="four"> 
                <input name="campaign_time" type="time">
            </li>
            <li class="five"> 
                <input name="campaign_date" type="date">
            </li>
            <li class="six">
                <input id="CreateCampaignInput" value="Create" type="submit">
            </li>
        </ul>
    </form>
    <section id="CampaignList">
    </section>  
	<script type="text/javascript" src="<?php echo $link ?>/scripts/campaign.js"></script>
</section>
