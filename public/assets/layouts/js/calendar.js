document.addEventListener('DOMContentLoaded', () => {
    const day_col = document.querySelector('.day-col');
    const currentDate = new Date();
    const currentYear = currentDate.getFullYear();
    const currentMonth = currentDate.getMonth();
  
    const firstDayOfMonth = new Date(currentYear, currentMonth, 1).getDay(); // Jour de la semaine où commence le mois (0 pour Dimanche, 1 pour Lundi, etc.)
    const numberOfDaysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
  
    const days = ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'];
    const months = ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet','Aout','Septembre','Octobre','Novembre','Decembre'];
  
    // Réarrangez les jours en commençant par le jour où commence le mois
    const rearrangedDays = [...days.slice(firstDayOfMonth), ...days.slice(0, firstDayOfMonth)];
  
    const dayRow = document.querySelector('.day-row');
    const month=document.querySelector('.month');
    const year=document.querySelector('.year');
    const date_c=document.querySelector('.date-c');
    month.textContent=months[currentDate.getMonth()];
    
    date_c.textContent=currentDate.getDate();
    
    year.textContent=currentDate.getFullYear();
    for (let i = 0; i < rearrangedDays.length; i++) {
      const th = document.createElement('th');
      th.textContent = rearrangedDays[i];
      dayRow.appendChild(th);
    }
  
    // Supposons que dates est votre tableau de dates
    const dates = Array.from({ length: numberOfDaysInMonth }, (_, i) => i + 1);
  
    // Supposons que tableBody est l'élément tbody où vous souhaitez insérer les dates
    const tableBody = document.querySelector('.table-body');
  
    // Divisez les dates en sous-tableaux de 7 jours chacun
    const rows = [];
    for (let i = 0; i < dates.length; i += 7) {
      rows.push(dates.slice(i, i + 7));
    }
  
    // Créez une nouvelle ligne <tr> pour chaque sous-tableau de dates
    rows.forEach(row => {
      const tr = document.createElement('tr');
      tr.classList.add('text-center');
      row.forEach(date => {
        const td = document.createElement('td');
        td.textContent = date;
        if(date==date_c.textContent)
        {
          td.classList.add('date-courant');
          td.style.backgroundColor='rgb(0, 160, 101)';
          td.style.color='white';
        }else{
          td.classList.remove('date-courant');
         
        }
        
        tr.appendChild(td);
      });
      tableBody.appendChild(tr);
    });
   
    //console.log(currentDate.getMonth());
  });
  