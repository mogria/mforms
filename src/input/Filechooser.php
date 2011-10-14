<?php


class Filechooser extends Inputfield {

  /**
   * returns the Attribute Type
   *
   * @return (string) ; "file"
   */
  public function getType() {
    return "file";
  }

  /**
   * if a file has been uploaded, so you can call
   * this function to validate that and move the file
   * to the correct location
   *
   * @param (string) $location_filename : the new location of the file
   * @param (int) $max_size : the maximal size of the uploaded file in bytes, false -> unlimited
   * @param (Array) $mine_types : An array containing the allowed/disallowd MIME-TYPE of the file
   * @param (bool) $is_whitelist : is the list of mime_types a while-(true) or a blacklist(false)
   */
  public function upload_to($location_filename, $max_size = false, $mime_types = Array(), $is_whitelist = false) {
    $file = $this->getValue();
    if(isset($file['tmp_name'], $file['name'], $file['size'])) {
      /** @todo the upload function finish, by using checkers */
    } else {
      throw new BadMethodCallException("there is no uploaded file in value property!");
    }
  }
}

