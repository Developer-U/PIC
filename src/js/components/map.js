ymaps.ready(init);

export default function init() {
    const myMap = new ymaps.Map('map', {
      center: [55.769626468214135,37.64019382275382],
      zoom: 14,
     
      controls: [],
    })
  
    const myPlacemark = new ymaps.Placemark([55.769626468214135,37.64019382275382], {}, {
      iconLayout: 'default#image',
      iconImageHref: 'images/placemark.svg',
      iconImageSize: [12, 12],
      iconImageOffset: [0, 0],
    })
  
  
    myMap.geoObjects.add(myPlacemark);
    myMap.behaviors.disable(['scrollZoom']);
  }

