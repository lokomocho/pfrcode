// test
// let lecav = document.querySelector("i");
// let selectTitle = false;
// lecav.addEventListener("click", () => {
//   console.log("ok ca click");
//   lecav.innerText = selectTitle ? "♦️♣️" : "♥️♠️";
//   selectTitle = !selectTitle;
// });

//Carrousel//
// class Carrousel {
//   /**
//    * @param {HTMLElement} element
//    * @param {Object} options
//    * @param {Object} options.slidesToScroll Nombre d'éléments à faire défiler
//    * @param {Object} options.slidesVisible Nombre d'éléments visibles dans une slide
//    */
//   constructor(element, options = {}) {
//     this.element = element;

//     //assign permet de fusionner les propriétés visées d'un objet, cela est plus précis que si on mettait seulement options et cela évite des bugs car options pourrait être utilisé ailleurs et rentrer en conflit avec celui là

//     this.options = Object.assign(
//       {},
//       {
//         slidesToScroll: 1,
//         slidesVisible: 1,
//       },
//       options
//     );
//     // On crée un élément qui sera notre caroussel
//     let root=this.createDivWithClass('carousel')
//     let container=this.createDivWithClass('carousel__container')
//     root.appendChild(container)
//     this.element.appendChild(root)

//   }

// /**
//  * @param {string} className
//  * @returns {HTMLElement}
//  *  */

//   createDivWithClass (className){
//     let div = document.createElement('div')
//     div.setattribute('class', className)
//     return div

//   }


// }

// document.addEventListener("DOMContentLoaded", function () {
//   new Caroussel(document.querySelector("#carousel1"), {
//     slidesToScroll: 3,
//     slidesVisible: 3,
//   });
// });
