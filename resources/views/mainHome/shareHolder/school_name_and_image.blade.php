    <style>
      /* Tooltip styling */
      .tooltip {
          visibility: hidden;
          background-color: #333;
          color: #fff;
          text-align: center;
          border-radius: 4px;
          padding: 5px 10px;
          position: absolute;
          z-index: 1;
          top: -35px; /* Adjust for position */
          left: 50%;
          transform: translateX(-50%);
          opacity: 0;
          white-space: nowrap; /* Prevents text wrapping */
          transition: opacity 0.3s ease;
      }

      /* Style for showing the tooltip */
      .tooltip.show {
          visibility: visible;
          opacity: 1;
      }

      /* Position the tooltip relative to the hovered text */
      #hoverText {
          position: relative;
          display: inline-block;
          cursor: pointer;
      }
    </style>

<div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
    <img src="{{ URL::to('/') }}/mainHomePage/img/school/{{ $school_data->image }}" alt="Profile" class="rounded-circle" style="border:4px solid #eee;height: 80px;width: 80px;">
    @if(strlen($school_data->school_name) > 18)
        <h2 id="hoverText">{{ substr($school_data->school_name,0,18).'..' }}</h2>
    @else
        <h2 id="hoverText">{{ $school_data->school_name }}</h2>
    @endif
    <h3 class="mt-2">School , <span style="font-family: sans-serif;color:blueviolet;font-style: italic;">{{ $school_data->school_code }}</span></h3>
    <div class="social-links mt-2">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-whatsapp"></i></a>
        <a href="#" class="linkedin"><i class="fas fa-envelope"></i></a>
        <a href="#" class="linkedin"><i class="fas fa-phone"></i></a>
    </div>
</div>


<script>
  // Select the text element
  const hoverText = document.getElementById('hoverText');

  // Create a tooltip element
  const tooltip = document.createElement('span');
  tooltip.classList.add('tooltip');
  tooltip.textContent = "{{ $school_data->school_name }}";
  hoverText.appendChild(tooltip);

  // Show the tooltip on hover
  hoverText.addEventListener('mouseenter', () => {
      tooltip.classList.add('show');
  });

  // Hide the tooltip when not hovering
  hoverText.addEventListener('mouseleave', () => {
      tooltip.classList.remove('show');
  });
</script>