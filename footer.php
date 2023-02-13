</td>
<?php
/**
 * @var \MyProject\Models\Users\User $user
 */
?>
<td width="300px" class="sidebar" bgcolor="#d8bfd8">
    <div class="sidebarHeader">Menu</div>
    <ul>
        <?php if ($user!==null):?>
        <li><a href="/">Main page</a></li>
        <li><a href="/articles/add">Add News</a></li>
        <?php endif?>
        <?php if ($user!==null && $user->isAdmin()): ?>
        <li><a href="/users/main">Users</a></li>
        <?php endif?>
    </ul>
</td>
</tr>
<tr bgcolor="#d8bfd8">
    <td class="footer" colspan="2">All news here</td>
</tr>
</table>

</body>
</html>