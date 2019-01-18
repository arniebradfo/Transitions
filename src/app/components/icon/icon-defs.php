<svg xmlns="http://www.w3.org/2000/svg"><symbol id="dropShadow">
	<filter id="dropshadow" height="130%">
	<feGaussianBlur in="SourceAlpha" stdDeviation="2"/> <!-- stdDeviation is how much to blur -->
	<feOffset dx="0" dy="0" result="offsetblur"/> <!-- how much to offset -->
	<feComponentTransfer>
		<feFuncA type="linear" slope="0.7"/> <!-- slope is the opacity of the shadow -->
	</feComponentTransfer>
	<feMerge> 
		<feMergeNode/> <!-- this contains the offset blurred image -->
		<feMergeNode in="SourceGraphic"/> <!-- this contains the element that the filter is applied to -->
	</feMerge>
	</filter>
</symbol><symbol id="icon_Arrow_Down" viewBox="0 0 14 14">
  <title>icon_Arrow_Down</title>
  <path d="M1,7.414V6H2.414L6,9.586V0H8V9.586L11.586,6H13V7.414l-6,6Z"/>
</symbol><symbol id="icon_Arrow_Left" viewBox="0 0 14 14">
  <title>icon_Arrow_Left</title>
  <path d="M6.586,1H8V2.414L4.414,6H14V8H4.414L8,11.586V13H6.586l-6-6Z"/>
</symbol><symbol id="icon_Arrow_Right" viewBox="0 0 14 14">
  <title>icon_Arrow_Right</title>
  <path d="M7.414,13H6V11.586L9.586,8H0V6H9.586L6,2.414V1H7.414l6,6Z"/>
</symbol><symbol id="icon_Arrow_Up" viewBox="0 0 14 14">
  <title>icon_Arrow_Up</title>
  <path d="M13,6.586V8H11.586L8,4.414V14H6V4.414L2.414,8H1V6.586l6-6Z"/>
</symbol><symbol id="icon_Comment" viewBox="0 0 14 14">
  <title>icon_Comment</title>
  <path d="M11,4H2V2h9Zm3,6H7L2,14V10H0V0H14ZM13,1H1V9H3v2.919L6.649,9H13ZM8,5H2V7H8Z"/>
</symbol><symbol id="icon_Contract" viewBox="0 0 14 14">
  <title>icon_Contract</title>
  <path d="M6,8v5H4V11.414L1.414,14H0V12.586L2.586,10H1V8Zm8-6.586V0H12.586L10,2.586V1H8V6h5V4H11.414Z"/>
</symbol><symbol id="icon_Expand" viewBox="0 0 14 14">
  <title>icon_Expand</title>
  <path d="M3.414,12H5v2H0V9H2v1.586L4.586,8H6V9.414ZM9,0V2h1.586L8,4.586V6H9.414L12,3.414V5h2V0Z"/>
</symbol><symbol id="icon_Link" viewBox="0 0 14 14">
  <title>icon_Link</title>
  <path d="M6,10A3.975,3.975,0,0,1,3.172,8.828l-2-2A4,4,0,1,1,6.828,1.172L7,1.344V3H5.828l-.414-.414a2.047,2.047,0,0,0-2.828,0,2,2,0,0,0,0,2.828l2,2a2.047,2.047,0,0,0,2.828,0L7.828,7H9V8.656l-.172.172A3.975,3.975,0,0,1,6,10Zm6.828-2.828-2-2a4,4,0,0,0-5.656,0L5,5.344V7H6.172l.414-.414a2.047,2.047,0,0,1,2.828,0l2,2a2,2,0,0,1,0,2.828,2.047,2.047,0,0,1-2.828,0L8.172,11H7v1.656l.172.172a4,4,0,1,0,5.656-5.656Z"/>
</symbol><symbol id="icon_Lock" viewBox="0 0 14 14">
  <title>icon_Lock</title>
  <path d="M11,6V4A4,4,0,0,0,3,4V6H1v8H13V6ZM5,4A2,2,0,0,1,9,4V6H5Zm6,8H3V8h8Z"/>
</symbol><symbol id="icon_Mail" viewBox="0 0 14 14">
  <title>icon_Mail</title>
  <path d="M14,7v6H0V7L2,8.143V11H12V8.143Zm0-6V5L7,9,0,5V1H14ZM7,7.848l5-2.857V3H2V4.991Z"/>
</symbol><symbol id="icon_Menu" viewBox="0 0 14 14">
  <title>icon_Menu</title>
  <path d="M14,3H0V1H14Zm0,3H0V8H14Zm0,5H0v2H14Z"/>
</symbol><symbol id="icon_Pointer_Down" viewBox="0 0 14 14">
  <title>icon_Pointer_Down</title>
  <path d="M14,4.414l-7,7-7-7V3H1.414L7,8.586,12.586,3H14Z"/>
</symbol><symbol id="icon_Pointer_Left" viewBox="0 0 14 14">
  <title>icon_Pointer_Left</title>
  <path d="M9.586,14l-7-7,7-7H11V1.414L5.414,7,11,12.586V14Z"/>
</symbol><symbol id="icon_Pointer_Right" viewBox="0 0 14 14">
  <title>icon_Pointer_Right</title>
  <path d="M4.414,0l7,7-7,7H3V12.586L8.586,7,3,1.414V0Z"/>
</symbol><symbol id="icon_Pointer_Up" viewBox="0 0 14 14">
  <title>icon_Pointer_Up</title>
  <path d="M0,9.586l7-7,7,7V11H12.586L7,5.414,1.414,11H0Z"/>
</symbol><symbol id="icon_Pointers_Horizontal" viewBox="0 0 14 14">
  <title>icon_Pointers_Horizontal</title>
  <path d="M9.205,0l4.7,7-4.7,7H8V12.206L11.5,7,8,1.794V0ZM6,14V12.206L2.5,7,6,1.794V0H4.8L.1,7l4.7,7Z"/>
</symbol><symbol id="icon_Pointers_Vertical" viewBox="0 0 14 14">
  <title>icon_Pointers_Vertical</title>
  <path d="M0,4.8,7,.1l7,4.7V6H12.206L7,2.5,1.794,6H0ZM14,8H12.206L7,11.5,1.794,8H0V9.205l7,4.7,7-4.7Z"/>
</symbol><symbol id="icon_Search" viewBox="0 0 14 14">
  <title>icon_Search</title>
  <path d="M8.5,0A5.494,5.494,0,0,0,3.972,8.614L0,12.586V14H1.414l3.972-3.972A5.5,5.5,0,1,0,8.5,0Zm0,9A3.5,3.5,0,1,1,12,5.5,3.5,3.5,0,0,1,8.5,9Z"/>
</symbol><symbol id="icon_Unlock" viewBox="0 0 14 14">
  <title>icon_Unlock</title>
  <path d="M5,6V4A2,2,0,0,1,9,4h2A4,4,0,0,0,3,4V6H1v8H13V6Zm6,6H3V8h8Z"/>
</symbol><symbol id="icon_X" viewBox="0 0 14 14">
  <title>icon_X</title>
  <path d="M14,12.586V14H12.586L7,8.414,1.414,14H0V12.586L5.586,7,0,1.414V0H1.414L7,5.586,12.586,0H14V1.414L8.414,7Z"/>
</symbol></svg>