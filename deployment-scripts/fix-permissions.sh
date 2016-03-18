#!/bin/bash

drupal_user=${2}
httpd_group=www-data

# Parse Command Line Arguments
while [ "$#" -gt 0 ]; do
  case "$1" in
    --drupal_user=*)
        drupal_user="${1#*=}"
        ;;
    --help) print_help;;
    *)
      printf "***********************************************************\n"
      printf "* Error: Invalid argument, run --help for valid arguments. *\n"
      printf "***********************************************************\n"
      exit 1
  esac
  shift
done


if [ -z "${drupal_user}" ] || [[ $(id -un "${drupal_user}" 2> /dev/null) != "${drupal_user}" ]]; then
  printf "*************************************\n"
  printf "* Error: Please provide a valid user. *\n"
  printf "*************************************\n"
  print_help
  exit 1
fi

echo "This script will download and run the Greyhead Drupal permissions fixer script,"
echo "setting drupal_user to $drupal_user. If a copy of the script already exists"
echo "here, you may need to provide your sudo password so it can be deleted."
echo ""
rm fix-permissions-greyhead.sh
if [ -f "fix-permissions-greyhead.sh" ]; then
  echo -n "Please enter your sudo password if prompted to remove the existing fix permissions script: "
  sudo rm fix-permissions-greyhead.sh
fi

curl -o fix-permissions-greyhead.sh https://raw.githubusercontent.com/alexharries/drupal-scripts-of-usefulness/master/fix-permissions.sh

if [ -f "fix-permissions-greyhead.sh" ]; then
  echo ""
  echo "Done :)"
  echo ""
  echo "Running ./fix-permissions-greyhead.sh now - you may be prompted for your sudo password to continue"
  echo ""
  sudo chmod +x fix-permissions-greyhead.sh && sudo ./fix-permissions-greyhead.sh --drupal_user=$drupal_user
else
  echo "It doesn't look like live-deploy.sh downloaded from"
  echo "https://raw.githubusercontent.com/alexharries/drupal-scripts-of-usefulness/master/live-deploy.sh"
  echo ""
  echo "Please manually download it, save it as fix-permissions-greyhead.sh and"
  echo "then run it by calling:"
  echo ""
  echo "sudo chmod +x fix-permissions-greyhead.sh && sudo ./fix-permissions-greyhead.sh --drupal_user=$drupal_user"
fi
exit
