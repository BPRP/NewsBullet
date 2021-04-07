<section id="Contacts">
    <h2 class="section-title">Your Contacts</h2>
    <form action="post">
        <ul class="create-card">
            <li class="one">
                <input placeholder="Email" id="ContactEmailInput" type="email">
            </li>
            <li class="two">
                <select name="listing" id="CreateContactListing">
                    <option value=""></option>
                </select>
            </li>
            <li class="six">
                <input id="CreateContactInput" type="submit" value="Create">
            </li>
        </ul>
    </form>
    <section id="ContactList">
    </section>
	<script type="text/javascript" src="<?php echo $link ?>/scripts/contacts.js"></script>
</section>
