<?php
   function directory_size($directory) {
      $directorySize=0;

      /* Open the directory and read its contents. */ 
      if ($dh = @opendir($directory)) {

         /* Iterate through each directory entry. */
         while (($filename = readdir ($dh))) {

            /* Filter out some of the unwanted directory entries. */
            if ($filename != "." && $filename != "..")
            {

               // File, so determine size and add to total.
               if (is_file($directory."/".$filename))
                  $directorySize += filesize($directory."/".$filename);

                  // New directory, so initiate recursion. */
                  if (is_dir($directory."/".$filename))
                     $directorySize += directory_size($directory."/".$filename);
            }
        } #endWHILE
     } #endIF

     @closedir($dh);
     return $directorySize;

   } #end directory_size()

   $directory = "/usr/local/apache2/htdocs/book/chapter10/";
   $totalSize = round((directory_size($directory) / 1024), 2);
   echo "Directory $directory: ".$totalSize. "kb.";

?>