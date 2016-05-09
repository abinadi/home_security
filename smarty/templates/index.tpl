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
                <tr class="{($sensor->alarm()) ? 'danger' : 'success'}">
                    <td>{$sensor->getName()}</td>
                    <td>{$sensor->getType()}</td>
                    <td>{$sensor->getState()}</td>
                    <td>{($sensor->alarm()) ? 'ALARM' : ''}</td>
                </tr>
            {/foreach}
        </tbody>
    </table>

    <h2>Bonus Wine Cellar Dual Temperature Sensor</h2>

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
            <tr class="{($dual->alarm()) ? 'danger' : 'success'}">
                <td>{$dual->getName()}</td>
                <td>{$dual->getType()}</td>
                <td>{$dual->getState()}</td>
                <td>{($dual->alarm()) ? 'ALARM' : ''}</td>
            </tr>
        </tbody>
    </table>

    <h2>Notes</h2>

    <p>
        *Temperatures are in fahrenheit.
    </p>

    <hr>

    {include file="footer.tpl"}
</div>