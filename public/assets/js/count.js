document.addEventListener('DOMContentLoaded',()=>{
    const minValue = 1;

    function CountFromOneToNumber(number,element) {
      let currentCount = minValue;
    
      return () => {
        if (currentCount >= number) {
          currentCount = number;
        } else {
          currentCount++;
        }
        element.textContent=currentCount;
    
      };
    }
    
    const counters = document.querySelectorAll(".counter");
    
    counters.forEach((counterElement) => {
      const number = parseInt(counterElement.textContent, 10); // Use parseInt with radix 10 for integers
      const counterFunction = CountFromOneToNumber(number,counterElement);
      setInterval(counterFunction, 0.02);
      
    });
})

