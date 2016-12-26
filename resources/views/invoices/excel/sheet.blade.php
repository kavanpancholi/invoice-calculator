<html>
<!-- Headings -->
<tr>
    <td><strong>Per Week</strong></td>
    <td><strong>Weeks</strong></td>
    <td><strong>From</strong></td>
    <td><strong>To</strong></td>
</tr>
<tr>
    <td>{!! $data['per_week_pay'] !!}</td>
    <td>{!! $data['no_of_weeks'] !!}</td>
    <td align="right">{!! $data['from_date'] !!}</td>
    <td align="right">{!! $data['to_date'] !!}</td>
</tr>

<tr></tr>

<tr>
    <td><strong>Holidays after limit</strong></td>
    <td>{!! $data['holidays_after_limit'] !!}</td>
</tr>
<tr>
    <td><strong>Sub-Total</strong></td>
    <td>{!! $data['subtotal'] !!}</td>
</tr>
<tr>
    <td><strong>Remaining</strong></td>
    <td>{!! $data['remaining'] !!}</td>
</tr>
<tr>
    <td><strong>Bonus</strong></td>
    <td>{!! $data['bonus'] !!}</td>
</tr>
<tr>
    <td><strong>Total Excluding Holidays</strong></td>
    <td>{!! $data['total_amount'] !!}</td>
</tr>

<tr></tr>

<tr>
    <td><strong>Paypal Email</strong></td>
    <td>{!! $data['paypal_email'] !!}</td>
</tr>

</html>