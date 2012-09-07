--LOGIN

   <form class="jNice" method="post" action="" >
      <fieldset style="margin-top:10px;">
         <p><label>Ingrese la clave para acceder al panel:</label><input name="key" type="text" class="text-long" /></p>
         <input type="submit" value="Acceder" />
      </fieldset>
   </form>
   
--!LOGIN

--BIENVENIDO

   <p style="margin-top:10px;">Bienvenid@ a la zona de administración. En esta zona podrás manejar algunas de las secciones principales de LeafWork
   tales como la gestión de templates, instalación de módulos, configuraciones, ver registros de error, etc.</p>
   
--!BIENVENIDO

--MENUNOLOGIN
   nada
--!MENUNOLOGIN


--MENU

   Hola

--!MENU


--TABLE
   <table cellpadding="0" cellspacing="0" style="margin-top:10px;">
      ${TABLA}
   </table>
--!TABLE

--CODTABLE

<tr class="${ODD}" >
   <td class="action" style="text-align:left;">
      
      <img src="../lwpanel/style/img/document-code.png" /><b>${ARCHIVO}</b><br />
      <img src="../lwpanel/style/img/spell-check-error.png" />${ERROR}<br />
      
      <div style="background: #E5E5E5; border: 1px solid gray; padding: 0px 5px 10px 5px; margin-bottom: 10px; line-height: 16px; font-family: courier;">
         <a style="text-decoration:none; color: black;">${CODIGO}</a>
      </div>
   
   </td>
   
   <td class="action">
      <a href="#" class="view"><img src="../lwpanel/style/img/sort-number.png" />${LINEA}</a>
      <a href="#" class="delete"><img src="../lwpanel/style/img/clock-small.png" />${HORA}</a>
   </td>

</tr>

--!CODTABLE
