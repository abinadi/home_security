{include file="header.tpl"}

<div class="container">
    <h1>Sensor State</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>State</th>
                <th>Alarm</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$sensors item=sensor}
                <tr class="{($sensor->alarm()) ? 'warning' : 'success'}">
                    <td>{$sensor->getName()}</td>
                    <td>{$sensor->getType()}</td>
                    <td>{$sensor->getState()}</td>
                    <td>{($sensor->alarm()) ? 'ALARM' : ''}</td>
                </tr>
            {/foreach}
        </tbody>
    </table>

    <hr>

    {include file="footer.tpl"}
</div>