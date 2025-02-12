
// Floorplan data
const floorplans = [
    {
      img: "/assets/floor-plan/3bhk.avif",
      title: "Find Your Perfect Home",
      highlight: "3BHK + SERVANT ROOM",
      size: "2642-2957 Sq. Ft.",
    },
    {
      img: "/assets/floor-plan/4bhk.avif",
      title: "Luxury Living Spaces",
      highlight: "4BHK + SERVANT ROOM",
      size: "3380 Sq. Ft.",
    }
  ];
  
  // Initialize current index
  let currentIndex = 0;
  
  // DOM elements
  const brochureImg = document.getElementById("brochure-img").querySelector("img");
  const brochureTitle = document.getElementById("brochure-title");
  const brochureHighlight = document.getElementById("brochure-highlight");
  const brochureSize = document.getElementById("brochure-size");
  
  // Update content function
  const updateBrochureContent = (index) => {
    const floorplan = floorplans[index];
    brochureImg.src = floorplan.img;
    brochureTitle.textContent = floorplan.title;
    brochureHighlight.textContent = floorplan.highlight;
    brochureSize.textContent = floorplan.size;
  };
  
  // Event listeners for next and prev buttons
  document.getElementById("next-btn").addEventListener("click", () => {
    currentIndex = (currentIndex + 1) % floorplans.length; // Loop to start
    updateBrochureContent(currentIndex);
  });
  
  document.getElementById("prev-btn").addEventListener("click", () => {
    currentIndex = (currentIndex - 1 + floorplans.length) % floorplans.length; // Loop to end
    updateBrochureContent(currentIndex);
  });
  
  // Initialize content
  updateBrochureContent(currentIndex);
  