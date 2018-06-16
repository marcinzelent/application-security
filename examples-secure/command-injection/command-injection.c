#include <stdlib.h>
#include <string.h>

int main(int argc, char **argv)
{
	int argl = strlen(argv[1]);
	char cmd[argl + 6];

	for (int i = 0; i < argl; i++)
		if (argv[1][i] == ';' || argv[1][i] == '|' || argv[1][i] == '&')
			argv[1][i] = ' ';
	strcpy(cmd, "echo ");
	strcat(cmd, argv[1]);
	system(cmd);

	return 0;
}
