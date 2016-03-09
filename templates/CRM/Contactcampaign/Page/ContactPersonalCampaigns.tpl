<h3>Personal Campaigns for this contact</h3>

<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Status</th>
            <th>Contribution/Event</th>
            <th># of Contributions</th>
            <th>Amount Raised</th>
            <th>Target Amount</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$campaigns item=campaign}
            <tr>
                <td>
                    <a href="{$campaign.view_url}">
                        {$campaign.title}
                    </a>
                </td>
                <td>{$campaign.status}</td>
                <td>{$campaign.page.title}</td>
                <td>{$campaign.num_contributions}</td>
                <td>{$campaign.total_contributed}</td>
                <td>{$campaign.goal_amount} {$campaign.currency}</td>
                <td>
                    <a href="{$campaign.edit_url}">
                        edit
                    </a>
                </td>
            </tr>
        {/foreach}
    </tbody>
</table>