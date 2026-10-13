//Calculo del Sueldo Quincenal
//Funcionamiento

1. El usuario ingresa su nombre*, cedula y las horas trabajadas en los turnos diurno, vespertino y nocturno.
2. Al presionar "Calcular", el formulario se envia por POST al mismo archivo (index.php).
3. El programa calcula el sueldo bruto con las siguientes tarifas por hora:

Turno       Tarifa (Bs.) 
Diurna     = 675          
Vespertina = 700    
Nocturna   = 956.23  

4. Segun el sueldo bruto, se aplican estos porcentajes de retencion:

 Sueldo bruto                     Ahorro Habitacional  Seguro Social 
 Menor a 85.000 Bs.              0.1%                   0.15%         
Entre 85.000 y 150.000 Bs.       0.15%                  0.2%          
Mayor a 150.000 Bs.              0.3%                   0.25%         

5. Se muestra en pantalla:
   - Nombre y cedula del empleado
   - Sueldo bruto
   - Monto descontado por Ahorro Habitacional y por Seguro Social
   - Sueldo quincenal neto (sueldo bruto menos las deducciones)




